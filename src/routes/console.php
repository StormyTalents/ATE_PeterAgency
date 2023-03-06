<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('data:fetch {all?}', function ($all = null) {

    # contacts
    $contacts = [];
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/contacts/get?token=9j3yuePEDuxmk6Stc6b16aA3wbuuJ9fOHjMaQmuUahp9QEDyZIwWGg7IxxOk'),true);
    foreach($data['data'] as $insurance) {
        $contacts[$insurance['slug']] = $insurance;
    }

    # inscats
    $updated_after = \App\Cats::orderBy('updated_at', 'desc')->first();
    $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/inscats/get?' . $aft . 'token=FVqJnmMnYz1EOPrvgDNczoxjyetq7d1nVgp7PVVEaEIEHKaGtrozK2JJpzba'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Cats::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Cats;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_cats', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_cats', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        $rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        $l->rating = $rating;
        $l->save();
    }

    # insdogs
    $updated_after = \App\Dogs::orderBy('updated_at', 'desc')->first();
    $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/insdogs/get?' . $aft . 'token=OFno1DzgWFglDZhL5FL7XaBdoGOhiQeu04elEL870HyAs0EhDlciYU1IEUgD'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Dogs::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Dogs;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_dogs', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_dogs', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        $rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        $l->rating = $rating;
        $l->save();
    }


    # insaccidents
    $updated_after = \App\Accidents::orderBy('updated_at', 'desc')->first();
    $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/insaccidents/get?' . $aft . 'token=5q8n1AgATmotKfhNIzAvBPuLMqboSzXuzvl1sUExPPiCCZ4G7E3XnpNHdpJZ'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Accidents::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Accidents;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_accidents', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_accidents', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        $l->rating_feeling = $l->rating;
        $l->rating_extent = 1;
        $l->rating_terms = 1;

        // Terms rating
        if($l->without_deductible == 1) {
            $l->rating_terms += 3;
        }
        if($l->valid_abroad_months > 6) {
            $l->rating_terms += 1;
        }

        // Extent rating
        if($l->invalidity_compensation > 0 && $l->economic_invalidity_compensation > 0) {
            $l->rating_extent += 1;
        }
        if($l->teeth_damage_compensation > 0) {
            $l->rating_extent += 1;
        }
        if($l->death_compensation > 0) {
            $l->rating_extent += 1;
        }
        if($l->pain_and_suffering > 0 && $l->scars > 0) {
            $l->rating_extent += 1.5;
        }
        
        // Max and min
        if($l->rating_terms > 5) {
            $l->rating_terms = 5;
        } else if($l->rating_terms < 1) {
            $l->rating_terms = 1;
        }
        if($l->rating_extent > 5) {
            $l->rating_extent = 5;
        } else if($l->rating_extent < 1) {
            $l->rating_extent = 1;
        }

        // Set avg rating
        $l->rating = ($l->rating_terms + $l->rating_extent + $l->rating_feeling) / 3;

        $l->save();

    }

    # inscars
    $updated_after = \App\Cars::orderBy('updated_at', 'desc')->first();
    if(isset($updated_after->updated_at)) {
        $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    } else {
        $updtime = date("Y-m-d H:i:s", 0);
    }
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/inscars/get?' . $aft . 'token=zD7tNFo4q47ZFbQLcR1WTcNjUAtfcPk0AvCDpJiQMIEEiBVYbS4wQGn1vhUk'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Cars::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Cars;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_cars', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_cars', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        #$rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        #$rating = round($rating * 2) / 2;
        #$l->rating = $rating;
        $l->save();
    }


    # inspregs
    $updated_after = \App\Pregnancies::orderBy('updated_at', 'desc')->first();
    if(isset($updated_after->updated_at)) {
        $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    } else {
        $updtime = date("Y-m-d H:i:s", 0);
    }
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/inspregs/get?' . $aft . 'token=kvpJ0eyzYzhK4yHegUSgd3gSLuXeYCbR8OR16P3eu3gIgfcRXryH1u5m7kX7'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Pregnancies::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Pregnancies;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_pregnancies', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_pregnancies', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        #$rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        #$rating = round($rating * 2) / 2;
        #$l->rating = $rating;
        $l->save();
    }

    # inshomes
    $updated_after = \App\Homes::orderBy('updated_at', 'desc')->first();
    if(isset($updated_after->updated_at)) {
        $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    } else {
        $updtime = date("Y-m-d H:i:s", 0);
    }
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/inshomes/get?' . $aft . 'token=WDBd5gqmFMo5MBrlUwNRYQSd8tYXCa44EISjVevQx4sz1ImaDjXR6wkuMWFF'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Homes::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Homes;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_homes', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_homes', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        #$rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        #$rating = round($rating * 2) / 2;
        #$l->rating = $rating;
        $l->save();
    }

    # insincs
    $updated_after = \App\Incomes::orderBy('updated_at', 'desc')->first();
    if(isset($updated_after->updated_at)) {
        $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    } else {
        $updtime = date("Y-m-d H:i:s", 0);
    }
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/insincs/get?' . $aft . 'token=XSln68Zgpd7891txhzRttXNOgrRMKBfPttmIHunJiUbP2vr5iDvu9TNsR8cN'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Incomes::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Incomes;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_incomes', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_incomes', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        #$rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        #$rating = round($rating * 2) / 2;
        #$l->rating = $rating;
        $l->save();
    }

    # inscomps
    $updated_after = \App\Companies::orderBy('updated_at', 'desc')->first();
    if(isset($updated_after->updated_at)) {
        $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    } else {
        $updtime = date("Y-m-d H:i:s", 0);
    }
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/inscomps/get?' . $aft . 'token=2xsijTXbPekZdWriQuriBn21BZ1Dp9vBONHMek8OZB5JVtKNhLTPGadNcge7'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Companies::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Companies;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_companies', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_companies', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        #$rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        #$rating = round($rating * 2) / 2;
        #$l->rating = $rating;
        $l->save();
    }

    # insmcs
    $updated_after = \App\Mcs::orderBy('updated_at', 'desc')->first();
    if(isset($updated_after->updated_at)) {
        $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    } else {
        $updtime = date("Y-m-d H:i:s", 0);
    }
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/insmcs/get?' . $aft . 'token=NzvNDmnSFtCgb4kqJgtiRp348JDqHdbfSwjUUD7KYllRbrfSkUGPAkrUrH7M'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Mcs::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Mcs;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_mcs', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_mcs', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        #$rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        #$rating = round($rating * 2) / 2;
        #$l->rating = $rating;
        $l->save();
    }

    # insboats
    $updated_after = \App\Boats::orderBy('updated_at', 'desc')->first();
    if(isset($updated_after->updated_at)) {
        $updtime = date("Y-m-d H:i:s", strtotime($updated_after->updated_at) - 180);
    } else {
        $updtime = date("Y-m-d H:i:s", 0);
    }
    $aft = 'updated_after=' . urlencode($updtime) . '&';
    if(rand(1,1) == 1||isset($all)) $aft = ''; # sometimes the whole db should be downloaded to make sure we dont miss anything
    $data = json_decode(file_get_contents('https://api.veloxiadata.com/insboats/get?' . $aft . 'token=Qn3tHaw65vRmCCJEyCC0Aq0DRNgXXBtSocpVKW9kWjPhYgMu9JiJs1uE5UjE'),true);
    foreach($data['data'] as $insurance) {
        $l = \App\Boats::where('slug','=',$insurance['slug'])->first();
        if(!$l) {
            $l = new \App\Boats;
        }
        foreach($insurance as $col => $newval) {
            if(in_array($col, ['id','created_at','updated_at'])) continue;
            if(!\Schema::hasColumn('insurances_boats', $col)) continue;
            if($l->$col != $newval) {
                echo 'Updating ' . $l->slug . '.' . $col . ' from ' . $l->$col . ' to ' . $newval . "\n";
            }
            $l->$col = $newval;
        }
        if(!isset($contacts[$insurance['slug']])) $contacts[$insurance['slug']] = [];
        foreach($contacts[$insurance['slug']] as $cnc => $cnv) {
            if(!\Schema::hasColumn('insurances_boats', $cnc)) continue;
            if(!isset($insurance[$cnc])||empty($insurance[$cnc])) {
                $l->$cnc = $cnv;
            }
        }
        #$rating = ($l->rating_age + $l->rating_deductible + $l->rating_life_insurance + $l->rating_price + $l->rating_veterinary + $l->rating_waiting) / 6;
        #$rating = round($rating * 2) / 2;
        #$l->rating = $rating;
        $l->save();
    }


})->describe('Fetch data from Veloxiadata');
