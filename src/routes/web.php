<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', [
        'title' => 'Jämför försäkringar & hitta den bästa ' . date("Y"),
        'listing_view' => 'listings.pets',
        'content_view' => 'index',
        'short_text' => 'Att hitta rätt försäkring är svårt. Vilket försäkringsbolag har bäst villkor? Vad får jag ersättning för? På Försäkringarna.se hjälper vi dig att hitta rätt.',
        'h1' => 'Jämför försäkringar',
        'box_navigation' => true,
    ]);
});

Route::get('/om-oss', function() {
    return view('about', [
        'title' => 'Om oss',
    ]);
});

$models = [
    'kattforsakring' => 'Cats',
    'hundforsakring' => 'Dogs',
    'olycksfallsforsakring' => 'Accidents',
    'bilforsakring' => 'Cars',
    'gravidforsakring' => 'Pregnancies',
    'hemforsakring' => 'Homes',
    'inkomstforsakring' => 'Incomes',
    'foretagsforsakring' => 'Companies',
    'mc-forsakring' => 'Mcs',
    'batforsakring' => 'Boats',
];

Route::get('/till/{category}/{slug}', function ($category, $slug = null) use($models) {

    if(isset($models[$category])) {
        $model = '\\App\\'.$models[$category];
        $insurance = $model::where('slug','=',$slug)->first();
        if(!$insurance) {
            return \App::abort(404);
        }
        return \Redirect::to($insurance->tracking_link);
    }

});

Route::get('/assets/{path}/{w}/{file}', function($path, $w=300, $file){

    $crop = false;
    $canvas = false;
    $loan_rating = false;
    $lrm = 0;

    if(preg_match('/\.cmp\.jpg/i', $file)) {
        $file = preg_replace('/\.cmp\.jpg$/i','.png', $file);
    }

    if(preg_match('/c(?<w>\d+)x(?<h>\d+)(?<padding>(?:p)\d+)?/i', $w, $hit)) {
        $w = $hit['w'];
        $h = $hit['h'];
        $cw = $w;
        $ch = $h;
        $canvas = true;
        if(isset($hit['padding'])&&strlen($hit['padding'])>0) {
            $padding = intval(preg_replace('/[^\d]/', '', $hit['padding']))/100;
            $wfactor = 1 - $padding;
            if($wfactor > 1||$wfactor<0.2) $wfactor = 0.5;
            $w = round($w * $wfactor);
            $w = round($w * $wfactor);
        }
    } else if(preg_match('/(?<w>\d+)x(?<h>\d+)/i', $w, $hit)) {
        $w = $hit['w'];
        $h = $hit['h'];
        $crop = true;
    }

    $etag = md5_file($path . '/' . str_replace(['webp','comp.jpg'],'png',$file));
    $img = Image::make($path . '/'.str_replace(['webp','comp.jpg'],'png',$file));

    if($crop) {
        $img->fit($w, $h);
    } else {
        $resized = $img->resize($w, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $text_offset = $resized->getSize()->height;
    }

    if($canvas) {
        $insert = $img;
        $img = Image::canvas($cw, $ch, '#ffffff');

        if(isset($text_offset)) {
            if($text_offset > $ch) {
                $insert->resize(null, $ch, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }

        $img->insert($insert, 'center');
    }

    $type = 'png';
    $quality = 100;
    if(preg_match('/jpg/i', $file)) {
        $type = 'jpeg';
        $quality = 80;
    } else if(preg_match('/webp/i', $file)) {
        $type = 'webp';
        if($w > 1000) {
            $quality = 85;
        } else if($w > 500) {
            $quality = 90;
        } else {
            $quality = 95;
        }
    }
    if($w < 180) {
        $quality = 100;
    }
    header('Pragma: public');
    header('Cache-Control: max-age=86400');
    header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
    header('Content-Type: image/' . $type);
    header("Etag: $etag");

    echo $img->encode($type, $quality);
    return;
});

Route::get('sitemap.xml', function() use($models) {

    Sitemap::addTag(URL::secure('/'));

    foreach($models as $category => $mod) {
        $model = '\\App\\'.$mod;
        Sitemap::addTag(URL::secure('/'.$category));
        foreach($model::where('slug','!=','')->where('locale','=',\App::getLocale())->get() as $ins) {
            Sitemap::addTag(URL::secure('/'.$category.'/'.$ins->slug));
        }
    }

    Sitemap::addTag(URL::secure('/om-oss'));

	return Sitemap::render();
});

Route::get('robots.txt', function() {
    $content = 'User-agent: *
Disallow:
Sitemap: ' . \URL::secure('/sitemap.xml');
return response($content, 200)
			->header('Content-Type', 'text/plain');
});

Route::get('/comment/post', function() {

    $data = \Request::input();

    #dd($data);

    $rating = trim($data['rating']);
    $name = trim($data['name']);
    $email = trim($data['email']);
    $ct = trim($data['title']);
    $comment = trim($data['comment']);

    $msg_grc_fail = 'Hoppsan! Någonting blev fel med anti-spam-kontrollen. Testa att skicka igen!';

    if(!isset($data['recaptcha_token'])) {
        return ['success' => false, 'message' => $msg_grc_fail];
    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                "secret=6Lcnv5MUAAAAAHRWfMzEPYsOPtBf0D1O33sNgNXX&response=" . $data['recaptcha_token']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);

    curl_close ($ch);

    $output = json_decode($server_output, true);

    if($output['success'] != true) {
       return ['success' => false, 'message' => $msg_grc_fail];
    }

    /* rating validation */
    if($rating < 1||$rating>5) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    }

    /* name validation */
    if(strlen($name) < 1) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    } else if(strlen($name) < 2||strlen($name)>30) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    }

    /* email validation */
    if(strlen($email) < 1) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    } else if(strlen($email) < 3) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    } else if(!preg_match('/[\w\dåäöÅÄÖ\-_\.]+@[\w\dåäöÅÄÖ\-_\.]+\.\w{2,30}/i', $email)) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    }

    /* title validation */
    if(strlen($ct) > 80) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    }

    /* comment validation */
    if(strlen($comment) < 1) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    } else if(strlen($comment) < 20) {
        return ['success' => false, 'message' => 'Någonting gick fel.'];
    }

    /* just to be sure */
    if($rating > 5) $rating = 5;
    else if($rating < 1) $rating = 1;

    $nc = new \App\Comment;
    $nc->insurance_id = \Request::input('insurance_id');
    $nc->insurance_type = \Request::input('insurance_type');
    $nc->name = encrypt($name);
    $nc->email = encrypt($email);
    $nc->title = $ct;
    $nc->comment = $comment;
    $nc->rating = $rating;
    $nc->created_at_unix = time();
    $nc->save();

    if($rating < 3) {
        $border_color = 'danger';
    } else if($rating == 3) {
        $border_color = 'yellow';
    } else if($rating > 3) {
        $border_color = 'success';
    }

    $output = '<div class="bg-success" style="padding: 10px; border: 1px solid rgba(0,0,0,0.05); margin-bottom: 15px; margin-top: 15px; border-radius: 3px;">
        <strong>Tack!</strong> Ditt omdöme kommer att publiceras så fort det har blivit granskat.
    </div>

    <div class="comment comment-border border-' . $border_color . '" style="opacity: 0.5 !important;">

    <div class="comment-left">
        <h4 style="margin-bottom: 0;">' . htmlentities($name) . '</h4>
    </div>
    <p>


        <span class="rating">';

    for($i = 1; $i <= 5; $i++) {
        if($i <= floor($rating)) {
            $output .= '<i class="fa fa-star text-'.$border_color.'"></i>';
        }

    }
    if(floor($rating) < $rating) {
        $output .= '<i class="fas fa-star-half-alt text-'.$border_color.'"></i>';
    }
    for($i = ceil($rating) + 1; $i <= 5; $i++) {
        $output .= '<i class="far fa-star text-'.$border_color.'"></i>';
    }

    $styled_comment = htmlentities($comment);
    $styled_comment = preg_replace('/(?:[\r\n]|^)(.+)(?:[\r\n]|$)/i',"<p>$1</p>", $styled_comment);
    $styled_comment = preg_replace('/([\r\n])/i','',$styled_comment);

    if(empty($ct)){
        $ct = $comment;
        if(strlen($ct) > 40) {
            if(preg_match_all('/([^\s\n]+)/i', $ct, $hit)) {
                $string = '';
                $wordbreak = false;
                foreach($hit[1] as $h) {
                    $ts = $string . ' ' . $h;
                    if(strlen($ts) > 40) {
                        $wordbreak = true;
                        $string = $ts;
                        break;
                    }
                    $string = $ts;
                }

                if(!$wordbreak) {
                    $ct = $string . '...';
                    if(strlen($string) < 10) {
                        $ct = substr(0,40,$ct) . '...';
                    }
                } else {
                    $ct = $string . '...';
                }
            } else {
                $ct = substr(0,40,$ct) . '...';
            }

        }
    }

    $output .= '</span>

    <span class="date">Alldeles nyss</span>
    <div class="clear"></div>
</p>
<h5>' . htmlentities($ct) . '</h5>
<p>
' . $styled_comment . '
</p>

</div>';

shell_exec("curl -X POST -H 'Content-type: application/json' --data '{\"text\":\"*New review on Försäkringarna.se*\n" . escapeshellcmd($name) . " has submitted a review on https://www.försäkringarna.se. Rating: " . $rating . "/5\"}' https://hooks.slack.com/services/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");

    return ['success' => true, 'comment' => $output];
});

Route::get('/{category}/{slug?}', function ($category, $slug = null) use($models) {

    $content = [
        'hundforsakring' => [
            'name' => 'Hundförsäkring',
            'name_plural' => 'Hundförsäkringar',
            'listing_view' => 'listings.pets',
            'presentation_view' => 'presentations.pets',
            'title' => 'Hundförsäkring: Jämför & hitta bästa hundförsäkringen ' . date("Y"),
            'h1' => 'Jämför hundförsäkringar',
            'intro_text' => 'Lalallalallalala',
            'best_pick' => 'Bästa hundförsäkringen ' . date("Y"),
            'other' => 'Övriga hundförsäkringar',
            'lang' => [
                'subject' => 'hund',
                'the' => 'hunden',
                'the_s' => 'hundens',
            ],
        ],
        'kattforsakring' => [
            'name' => 'Kattförsäkring',
            'name_plural' => 'Kattförsäkringar',
            'listing_view' => 'listings.pets',
            'presentation_view' => 'presentations.pets',
            'title' => 'Kattförsäkring: Jämför & hitta bästa kattförsäkringen ' . date("Y"),
            'h1' => 'Jämför kattförsäkringar',
            'intro_text' => 'Lalallalallalala',
            'best_pick' => 'Bästa kattförsäkringen ' . date("Y"),
            'other' => 'Övriga kattförsäkringar',
            'lang' => [
                'subject' => 'katt',
                'the' => 'katten',
                'the_s' => 'kattens',
            ],
        ],
        'bilforsakring' => [
            'name' => 'Bilförsäkring',
            'name_plural' => 'Bilförsäkringar',
            'listing_view' => 'listings.cars',
            'presentation_view' => 'presentations.cars',
            'title' => 'Bilförsäkring: Jämför & hitta bästa bilförsäkringen ' . date("Y"),
            'h1' => 'Jämför bilförsäkringar',
            'intro_text' => 'Lalallalallalala',
            'best_pick' => 'Bästa bilförsäkringen ' . date("Y"),
            'other' => 'Övriga bilförsäkringar',
        ],
        'inkomstforsakring' => [
            'name' => 'Inkomstförsäkring',
            'name_plural' => 'Inkomstförsäkringar',
            'listing_view' => 'listings.incomes',
            'presentation_view' => 'presentations.incomes',
            'title' => 'Inkomstförsäkring: Jämför & hitta bästa inkomstförsäkringen ' . date("Y"),
            'h1' => 'Jämför inkomstförsäkringar',
            'best_pick' => 'Bästa inkomstförsäkringen ' . date("Y"),
            'other' => 'Övriga inkomstförsäkringar',
        ],
        'hemforsakring' => [
            'name' => 'Hemförsäkring',
            'name_plural' => 'Hemförsäkringar',
            'listing_view' => 'listings.homes',
            'presentation_view' => 'presentations.homes',
            'title' => 'Hemförsäkring: Jämför & hitta bästa hemförsäkringen ' . date("Y"),
            'h1' => 'Jämför hemförsäkringar',
            'best_pick' => 'Bästa hemförsäkringen ' . date("Y"),
            'other' => 'Övriga hemförsäkringar',
        ],
        'gravidforsakring' => [
            'name' => 'Gravidförsäkring',
            'name_plural' => 'Gravidförsäkringar',
            'listing_view' => 'listings.pregnancies',
            'presentation_view' => 'presentations.pregnancies',
            'title' => 'Gravidförsäkring: Jämför & hitta bästa gravidförsäkringen ' . date("Y"),
            'h1' => 'Jämför gravidförsäkringar',
            'best_pick' => 'Bästa gravidförsäkringen ' . date("Y"),
            'other' => 'Övriga gravidförsäkringar',
        ],
        'olycksfallsforsakring' => [
            'name' => 'Olycksfallsförsäkring',
            'name_plural' => 'Olycksfallsförsäkringar',
            'listing_view' => 'listings.accidents',
            'presentation_view' => 'presentations.accident',
            'title' => 'Olycksfallsförsäkring: Jämför & hitta bästa olycksfallsförsäkringen ' . date("Y"),
            'h1' => 'Jämför olycksfallsförsäkringar',
            'best_pick' => 'Bästa olycksfallsförsäkringen ' . date("Y"),
            'other' => 'Övriga olycksfallsförsäkringar',
        ],
        'mc-forsakring' => [
            'name' => 'MC-försäkring',
            'name_plural' => 'MC-försäkringar',
            'listing_view' => 'listings.mcs',
            'presentation_view' => 'presentations.mcs',
            'title' => 'MC-försäkring: Jämför & hitta bästa MC-försäkringen ' . date("Y"),
            'h1' => 'Jämför MC-försäkringar',
            'best_pick' => 'Bästa MC-försäkringen ' . date("Y"),
            'other' => 'Övriga MC-försäkringar',
        ],
        'batforsakring' => [
            'name' => 'Båtförsäkring',
            'name_plural' => 'Båtförsäkringar',
            'listing_view' => 'listings.boats',
            'presentation_view' => 'presentations.boats',
            'title' => 'Båtförsäkring: Jämför & hitta bästa båtförsäkringen ' . date("Y"),
            'h1' => 'Jämför båtförsäkringar',
            'best_pick' => 'Bästa båtförsäkringen ' . date("Y"),
            'other' => 'Övriga båtförsäkringar',
        ],
        'foretagsforsakring' => [
            'name' => 'Företagsförsäkring',
            'name_plural' => 'Företagsförsäkringar',
            'listing_view' => 'listings.companies',
            'presentation_view' => 'presentations.companies',
            'title' => 'Företagsförsäkring: Jämför & hitta bästa företagsförsäkringen ' . date("Y"),
            'h1' => 'Jämför företagsförsäkringar',
            'best_pick' => 'Bästa företagsförsäkringen ' . date("Y"),
            'other' => 'Övriga företagsförsäkringar',
        ],
        'villaforsakring' => [
            'name' => 'Villaförsäkring',
            'name_plural' => 'Villaförsäkringar',
            'listing_view' => '',
            'presentation_view' => '',
            'title' => 'Villaförsäkring: Jämför & hitta bästa villaförsäkringen ' . date("Y"),
            'h1' => 'Jämför villaförsäkringar',
            'best_pick' => 'Bästa villaförsäkringen ' . date("Y"),
            'other' => 'Övriga villaförsäkringar',
        ],
        'id-skydd' => [
            'name' => 'ID-skydd',
            'name_plural' => 'ID-skydd',
            'listing_view' => '',
            'presentation_view' => '',
            'title' => 'ID-skydd: Jämför & hitta bästa ID-skyddet ' . date("Y"),
            'h1' => 'Jämför ID-skydd',
            'best_pick' => 'Bästa ID-skyddet ' . date("Y"),
            'other' => 'Övriga ID-skydd',
        ],
        'barnforsakring' => [
            'name' => 'Barnförsäkring',
            'name_plural' => 'Barnförsäkringar',
            'listing_view' => '',
            'presentation_view' => '',
            'title' => 'Barnförsäkring: Jämför & hitta bästa barnförsäkringen ' . date("Y"),
            'h1' => 'Jämför barnförsäkringar',
            'best_pick' => 'Bästa barnförsäkringen ' . date("Y"),
            'other' => 'Övriga barnförsäkringar',
        ],
    ];

    if(isset($slug)) {

        if(isset($models[$category])) {
            $model = '\\App\\'.$models[$category];
            $insurance = $model::where('slug','=',$slug)->first();
            if(!$insurance) {
                return \App::abort(404);
            }

            $document = \App\CMS::fetch('forsakringarnase_review', $category . '-' . $slug);
            $catContent = $content[$category];
            $catContent['slug'] = $category;

            return view('modules.review', [
                'title' => $insurance->name . ' – ' . $content[$category]['name'] . ': Omdöme & betyg',
                //'title' => \App\CMS::asText($document->data, 'title'),
                'document' => $document,
                'content' => isset($document->data) ? $document->data : null,
                'category' => $catContent,
                'insurance' => $insurance,
                'all_models' => $models,
                'all_content' => $content,
            ]);

            /*
            return view($content[$category]['presentation_view'], [
                'title' => $insurance->name . ' – ' . $content[$category]['name'] . ': Omdöme & betyg',
                'insurance' => $insurance,
                'category' => [
                    'name' => $content[$category]['name'],
                    'name_plural' => $content[$category]['name_plural'],
                    'slug' => $category,
                    'lang' => isset($content[$category]['lang']) ? $content[$category]['lang'] : null,
                ],
                'all_models' => $models,
                'all_content' => $content,
            ]);
            */

        }

    }

    if(isset($content[$category]) && !isset($slug)) {
        if(isset($models[$category])) {
            $model = '\\App\\'.$models[$category];
            $products = $model::where('slug','!=','')->orderByRaw("tracking_link != '' desc, rating desc");
        } else {
            $products = null;
        }

        return view('index', [
            'title' => $content[$category]['title'],
            'listing_view' => $content[$category]['listing_view'],
            'content_view' => $category,
            'h1' => $content[$category]['h1'],
            'best_pick' => $content[$category]['best_pick'],
            'other' => $content[$category]['other'],
            'insurances' => $products,
            'category' => [
                'name' => $content[$category]['name'],
                'name_plural' => $content[$category]['name_plural'],
                'slug' => $category,
            ],
        ]);
    }

    return \App::abort(404);

});
