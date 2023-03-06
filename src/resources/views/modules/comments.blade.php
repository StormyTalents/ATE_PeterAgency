<script src="https://www.google.com/recaptcha/api.js?render=6Lcnv5MUAAAAADQD1hWWTI88VyxAaBHcLKGO8TWd"></script>

<section class="article comments-box" style="background: #f9f9f9;" id="omdomen">
    
        <div class="content align-left">

            <h2 class="align-center">@lang('terms.what_do_the_users_think') {{$insurance->name}} {{$category['name']}}?</h2>

        <?php
        $reviews = \App\Comment::where('insurance_type','=',$category['slug'])->where('insurance_id','=',$insurance->slug)->where('status','=',1)->orderBy('created_at_unix', 'desc');
        ?>

        <br>

        <h3>@lang('terms.all_reviews')</h3>

        

        <?php $visible = []; ?>

        <div id="comments_container">

            @if($reviews->count() == 0)

            
                <center style="font-size: 18px; padding: 30px 15%; margin-top: 15px; box-shadow: 0 3px 6px -3px rgba(0,0,0,0.2);" class="bg-white" id="no_comments">
                    <i>
                        @lang('terms.no_comments',['name' => $insurance->name])
                    </i>
                </center>

                

            @else

                
        

                @foreach($reviews->orderBy('created_at_unix', 'desc')->get() as $review)

                <?php
                    $visible[] = $review->id;
                ?>

                <?php
                if($review->rating < 3) {
                    $border_color = 'danger';
                } else if($review->rating == 3) {
                    $border_color = 'yellow';
                } else if($review->rating > 3) {
                    $border_color = 'success';
                }
                ?>
                
                
                <div class="comment comment-border border-{{$border_color}}">

                    <div class="comment-left">
                        <h4 style="margin-bottom: 0;">{{decrypt($review->name)}}</h4>
                    </div>
                        

                        <span class="rating">
                            <?php for($i = 1; $i <= 5; $i++) {
                                if($i <= floor($review->rating)) {
                                    echo '<i class="fa fa-star text-'.$border_color.'"></i>';
                                }
                                
                            }
                            if(floor($review->rating) < $review->rating) {
                                    echo '<i class="fas fa-star-half-alt text-'.$border_color.'"></i>';
                            }
                            for($i = ceil($review->rating) + 1; $i <= 5; $i++) {
                                echo '<i class="far fa-star text-'.$border_color.'"></i>';
                            }
                            ?>
                        </span>

                        <?php
                        $months = [
                            1 => 'jan',
                            2 => 'feb',
                            3 => 'mar',
                            4 => 'apr',
                            5 => 'maj',
                            6 => 'jun',
                            7 => 'jul',
                            8 => 'aug',
                            9 => 'sep',
                            10 => 'okt',
                            11 => 'nov',
                            12 => 'dec',
                        ];
                        $time = time() - $review->created_at_unix;
                        if($time < 60) {
                            $time = 'Alldeles nyss';
                        } else if($time < 3600) {
                            $time = floor($time / 60) . ' min';
                        } else if($time < 3600 * 24) {
                            $time = floor($time / 3600) . ' tim';
                        } else if($time < 3600 * 24 * 30) {
                            $time = floor($time / (3600 * 24)) . ' d';
                        } else {
                            if(preg_match('/(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})/i', date("Y-m-d", $review->created_at_unix), $hit)) {
                                $time = intval($hit['day']) . ' ' . $months[intval($hit['month'])];
                                if($hit['year'] != date("Y")) {
                                    $time .= ' ' . $hit['year'];
                                }
                            } else {
                                $time = '';
                            }
                        }
                        ?>

                        <span class="date">{{$time}}</span>
                        <div class="clear"></div>
                    
                    <div style="height: 10px;"></div>


                    <?php
                    if(!empty($review->title)){
                        $ct = $review->title;
                    } else {
                        $ct = $review->comment;
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
                    ?>
                    <h5>{{$ct}}</h5>
                    <?php
                    $styled_comment = htmlentities($review->comment);
                    $styled_comment = preg_replace('/(?:[\r\n]|^)(.+)(?:[\r\n]|$)/i',"<p>$1</p>", $styled_comment);
                    $styled_comment = preg_replace('/([\r\n])/i','',$styled_comment);
                    ?>
                    
                    {!!$styled_comment!!}

                    @if(!empty($review->answer))

                    <div class="answer">

                        <div class="comment-left">
                            <img src="@lang('images.logo')" width="80" alt="@lang('general.site_name_full')">
                        </div>
                        
                        <div class="answer-text">
                            <b class="text-success">{{$review->answer_by}} på @lang('general.site_name_full')</b>
                                <?php
                                $styled_answer = htmlentities($review->answer);
                                $styled_answer = preg_replace('/(?:[\r\n]|^)(.+)(?:[\r\n]|$)/i',"<p>$1</p>",$styled_answer);
                                $styled_answer = preg_replace('/([\r\n])/i','',$styled_answer);
                                ?>
                                    {!!$styled_answer!!}
                        </div>

                    </div>

                    @endif


                </div>



                @endforeach

                



            
            @endif

            </div>

            <input type="hidden" id="visible_comments" value="{{implode(',', $visible)}}">


            <div id="new-review"></div>

            <br>
            <br>

            <h3>@lang('terms.write_a_review')</h3>

            <form method="post" action="/comment/post" id="comment">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="insurance_type" value="{{$category['slug']}}">
                <input type="hidden" name="insurance_id" value="{{$insurance->slug}}">

                <div class="form-table">
                    <div class="loader"><i class="fa fa-cog fa-spin"></i></div>
                    <table width="100%">
                    
                        <tr>
                            
                            <td width="30%" valign="top">
                                <span class="title">@lang('terms.your_rating'):</span>
                            </td>
                            <td>
                                <span name="rating">
                                    <i class="far fa-star text-gray comment-rating" data-rating="1" id="comment-rating-1" onclick="btnChangeRating(1);"></i>
                                    <i class="far fa-star text-gray comment-rating" data-rating="2" id="comment-rating-2" onclick="btnChangeRating(2);"></i>
                                    <i class="far fa-star text-gray comment-rating" data-rating="3" id="comment-rating-3" onclick="btnChangeRating(3);"></i>
                                    <i class="far fa-star text-gray comment-rating" data-rating="4" id="comment-rating-4" onclick="btnChangeRating(4);"></i>
                                    <i class="far fa-star text-gray comment-rating" data-rating="5" id="comment-rating-5" onclick="btnChangeRating(5);"></i>
                                </span>
                                <input type="hidden" id="inv-rating" value="0">
                                <div class="error-msg" id="error_rating"></div>
                            </td>
                        </tr>
                        <tr> 
                            <td width="30%" valign="top">
                                <span class="title">@lang('terms.your_first_name'):</span>
                            </td>
                            <td>
                                <input type="text" class="input" name="name">
                                <div class="error-msg" id="error_name"></div>
                            </td>
                        </tr>
                        <tr> 
                            <td width="30%" valign="top">
                                <span class="title">@lang('terms.email_address'):<br>
                                <small style="color: #999;">(@lang('terms.not_public'))</small></span>
                            </td>
                            <td>
                                <input type="email" class="input" name="email">
                                <div class="error-msg" id="error_email"></div>
                            </td>
                        </tr>
                        <tr>
                            
                            <td width="30%" valign="top">
                                <span class="title">@lang('terms.give_your_review_a_title'):<br>
                                <small style="color: #999;">(@lang('terms.voluntary'))</small></span>
                            </td>
                            <td>
                                <input type="text" class="input" name="title">
                                <div class="error-msg" id="error_title"></div>
                            </td>
                        </tr>
                        <tr>
                            
                            <td width="30%" valign="top">
                                <span class="title">@lang('terms.tell_us_about_experience') {{$insurance->name}}:</span>
                            </td>
                            <td>
                                <textarea class="textarea" name="comment" rows="8"></textarea>
                                <div class="error-msg" id="error_comment"></div>
                            </td>
                        </tr>
                        <tr>
                            
                            <td width="30%" valign="top">
                                
                            </td>
                            <td>

                                <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                                
                                <script>
                                grecaptcha.ready(function() {
                                    grecaptcha.execute('6Lcnv5MUAAAAADQD1hWWTI88VyxAaBHcLKGO8TWd', {action: 'homepage'}).then(function(token) {
                                        document.getElementById('recaptcha_token').value = token;
                                    });
                                });
                                </script>    
                                
                                <button
                                type="submit"
                                class="btn bg-success border-success"
                                id="comment_submit" style="font-size: 14px; padding: 18px 30px; border: 0;">@lang('terms.send_review')</button>

                                <br>

                                <div class="error-msg" id="error_general"></div>

                            </td>
                        </tr>
                    </table>
                </div>
            </form>

            <center style="font-weight: 500; font-size: 10px; color: #999; margin-top: 15px; padding: 10px 10%; line-height: 140%;">
                @lang('terms.review_policy')
            </center>


        </div>

</section>
