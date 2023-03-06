@extends('app')
@section('content')

    <section class="top">

        <div class="content">


            @include('modules.breadcrumbs')
            
            <div class="listing">


                <div class="row">
                    <div class="panel add-gap">
                        
                        <h1>{{$insurance->name}} {{mb_strtolower($category['name'])}}</h1>
                        
                        @include('modules.presentation-benefits')


                    </div>
                </div>


                <div class="row">
                    
                    <div class="panel">
                        
                        <table>
                            <tr>
                                <td class="align-right" width="50%"><strong>Veterinärvård:</strong></td>
                                <td>Upp till {{\App\Format::amount($insurance->compensation_amount_to)}}/år</td>
                            </tr>
                            <tr>
                                <td class="align-right" width="50%"><strong>Karenstid:</strong></td>
                                <td>@if($insurance->waiting_period === 0)
                                        Ingen karenstid
                                    @else 
                                        {{$insurance->waiting_period}} dagar
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="align-right" width="50%"><strong>Fast självrisk:</strong></td>
                                <td>{{\App\Format::amount($insurance->deductible_fixed_from,$insurance->deductible_fixed_to)}}</td>
                            </tr>
                            <tr>
                                <td class="align-right" width="50%"><strong>Rörlig självrisk:</strong></td>
                                <td>{{\App\Format::percent($insurance->deductible_variable_from,$insurance->deductible_variable_to)}}</td>
                            </tr>
                            <tr>
                                <td class="align-right" width="50%"><strong>Självriskperiod:</strong></td>
                                <td>{{$insurance->deductible_period}} dagar</td>
                            </tr>
                            
                            <tr>
                                <td class="align-right" width="50%"><strong>Ersättningsbelopp minskas:</strong></td>
                                <td>
                                    @if($insurance->compensation_amount_reduction_age === 0)
                                        Minskas inte oavsett ålder
                                    @else
                                        {{\App\Format::amount($insurance->compensation_amount_reduction_kr)}} per år från {{$insurance->compensation_amount_reduction_age}} års ålder
                                    @endif
                                </td>
                            </tr>
                            <?php /*
                            <tr>
                                <td class="align-right" width="50%"><strong>Livförsäkringsbelopp minskas:</strong></td>
                                <td>{{$insurance->life_insurance_reduction_percent}} % per år från {{$insurance->life_insurance_reduction_age}} års ålder</td>
                            </tr>
                            <tr>
                                <td class="align-right" width="50%"><strong>Livförsäkring upphör:</strong></td>
                                <td>Vid {{$insurance->life_insurance_expires}} års ålder</td>
                            </tr>
                            */ ?>
                            
                            <tr>
                                <td class="align-right" width="50%"><strong>{{ucfirst($category['lang']['the_s'])}} ålder:</strong></td>
                                <td>
                                    @if($insurance->insurable_from_weeks === 0 && $insurance->insurable_to_years === 0)
                                        Inga ålderskrav
                                    @elseif($insurance->insurable_to_years === 0)
                                        Från {{$insurance->insurable_from_weeks}} veckor, ingen övre gräns
                                    @else
                                        {{$insurance->insurable_from_weeks}} veckor till {{$insurance->insurable_to_years}} år
                                    @endif
                                </td>
                            </tr>
                            
                                
                        </table>
                        

                    </div>
                    <div class="panel">

                            <img class="lazy" src="/img/placeholder.png" data-src="/assets/logos/c150x75/{{$insurance->slug}}.comp.jpg" alt="{{$insurance->name}} {{$category['name']}}" width="150" height="75" alt="{{$insurance->name}}" data-srcset="
                            /assets/logos/c150x75/{{$insurance->slug}}.comp.jpg 1x, 
                            /assets/logos/c300x150/{{$insurance->slug}}.comp.jpg 2x,
                            /assets/logos/c450x300/{{$insurance->slug}}.comp.jpg 3x
                        ">

                        

                        <?php $rating = round($insurance->rating * 2) / 2; ?>
                        <span class="rating">
                            <?php for($i = 1; $i <= 5; $i++) {
                                if($i <= floor($rating)) {
                                    echo '<i class="fa fa-star text-yellow"></i>';
                                }
                                
                            }
                            if(floor($rating) < $rating) {
                                    echo '<i class="fas fa-star-half-alt text-yellow"></i>';
                            }
                            for($i = ceil($rating) + 1; $i <= 5; $i++) {
                                echo '<i class="far fa-star text-yellow"></i>';
                            }
                            ?>
                        </span>

                        
                        
                    
                        <p>
                            <br>
                            @if(!empty($insurance->tracking_link))
                                <a href="/till/{{$category['slug']}}/{{$insurance->slug}}" target="_blank" rel="nofollow noopener" class="cta bg-success">Se ditt pris</a>
                            @else 
                                <div style="display: inline-block; background: #fafafa; font-size: 0.8em; font-weight: 700; padding: 10px 15px;">Vi samarbetar inte med {{$insurance->name}}.</div>
                            @endif
                        </p>

                    </div>

                </div>

                <br>

            </div>

            <p style="font-size: 12px; line-height: 1.25; color: #fff; margin: 0 auto; max-width: 70%; min-width: 280px; margin-top: 25px;">
                Informationen om försäkringen hämtas automatiskt från försäkringsbolagets hemsida. Senaste uppdateringen gjordes {{$insurance->updated_at}}. Om villkoren avviker från de villkor som försäkringsbolaget presenterar är det försäkringbolagets villkor som gäller.   
            </p>

        </div>

    </section>

    

<section class="article" style="background: #f9f9f9;">
    
        <div class="content align-center">

            <h2>Vad ersätts av {{$insurance->name}} {{mb_strtolower($category['name'])}}?</h2>

            <table class="valign-top no-bg">
                <tr style="background: none !important;">
                    <td width="35%" class="align-right">
                        <p>
                            <strong>Veterinärvård:</strong>
                        </p>
                    </td>
                    <td>
                        <p>
                            {{$insurance->name}} {{mb_strtolower($category['name'])}} ersätter kostnader för veterinärvård upp till {{\App\Format::amount($insurance->compensation_amount_to)}} per år. Ersättning ges dock inte för kostnader som uppstått inom {{$insurance->waiting_period}} dagar från att försäkringen tecknades (karenstiden).
                        </p>
                    </td>
                </tr>
                @if($insurance->firstvet_included == 1)
                <tr style="background: none !important;">
                    <td width="35%" class="align-right">
                        <p>
                            <strong>Veterinärbesök i mobilen:</strong>
                        </p>
                    </td>
                    <td>
                        <p>
                            Med {{$insurance->name}} {{mb_strtolower($category['name'])}} får du kostnadsfri tillgång till veterinärbesök i mobilen genom appen FirstVet.
                        </p>
                    </td>
                </tr>
                @endif
                <tr style="background: none !important;">
                    <td width="35%" class="align-right">
                        <p>
                            <strong>Livförsäkring:</strong>
                        </p>
                    </td>
                    <td>
                        <p>
                            Om din {{$category['lang']['subject']}} dör eller måste avlivas kan {{$insurance->name}} ersätta {{$category['lang']['the_s']}} marknadsvärde. 
                            @if($insurance->life_insurance_reduction_age > 0)
                                Beloppet minskar när din {{$category['lang']['subject']}} har fyllt {{$insurance->life_insurance_reduction_age}} år och upphör helt när {{$category['lang']['the']}} har fyllt {{$insurance->life_insurance_expires}} år.
                            @elseif($insurance->life_insurance_reduction_expires > 0)
                                Livsförsäkringen upphör när {{$category['lang']['the']}} fyller {{$insurance->life_insurance_expires}} år. 
                            @endif
                        </p>
                    </td>
                </tr>

            </table>

        </div>

    </section>
    <section class="article bg-info">
    
            <div class="content align-center">
    
                <h2 class="text-white">Hur bra är {{$insurance->name}} jämfört med konkurrenterna?</h2>
    
    
                <table class="rating-table valign-top no-bg">
                    <tr>
                        <td width="35%" class="align-right">
                            <p>
                                <strong>Veterinärvård:</strong>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_veterinary)) {
                                        echo '<i class="fa fa-star text-white" style="font-size: 24px;"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_veterinary) < $insurance->rating_veterinary) {
                                        echo '<i class="fas fa-star-half-alt text-white" style="font-size: 24px;"></i>';
                                }
                                for($i = ceil($insurance->rating_veterinary) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-white" style="font-size: 24px;"></i>';
                                }
                                ?>
                            </p>
                            <p>
                                Veterinärvårdsförsäkringen ersätter kostnader upp till {{\App\Format::amount($insurance->compensation_amount_to)}} per år.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="35%" class="align-right">
                            <p>
                                <strong>Självrisk:</strong>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_deductible)) {
                                        echo '<i class="fa fa-star text-white" style="font-size: 24px;"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_deductible) < $insurance->rating_deductible) {
                                        echo '<i class="fas fa-star-half-alt text-white" style="font-size: 24px;"></i>';
                                }
                                for($i = ceil($insurance->rating_deductible) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-white" style="font-size: 24px;"></i>';
                                }
                                ?>
                            </p>
                            <p>
                                Fast självrisk på {{\App\Format::amount($insurance->deductible_fixed_from,$insurance->deductible_fixed_to)}} och rörlig självrisk på {{\App\Format::percent($insurance->deductible_variable_from,$insurance->deductible_variable_to)}} kan väljas.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="35%" class="align-right">
                            <p>
                                <strong>Karenstid:</strong>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_waiting)) {
                                        echo '<i class="fa fa-star text-white" style="font-size: 24px;"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_waiting) < $insurance->rating_waiting) {
                                        echo '<i class="fas fa-star-half-alt text-white" style="font-size: 24px;"></i>';
                                }
                                for($i = ceil($insurance->rating_waiting) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-white" style="font-size: 24px;"></i>';
                                }
                                ?>
                            </p>
                            <p>
                                @if($insurance->waiting_period === 0)
                                    {{$insurance->name}} har ingen karenstid.
                                @else 
                                    Karenstiden är {{$insurance->waiting_period}} dagar.
                                @endif
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="35%" class="align-right">
                            <p>
                                <strong>Ålder:</strong>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_age)) {
                                        echo '<i class="fa fa-star text-white" style="font-size: 24px;"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_age) < $insurance->rating_age) {
                                        echo '<i class="fas fa-star-half-alt text-white" style="font-size: 24px;"></i>';
                                }
                                for($i = ceil($insurance->rating_age) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-white" style="font-size: 24px;"></i>';
                                }
                                ?>
                            </p>
                            <p>
                                @if($insurance->insurable_from_weeks === 0 && $insurance->insurable_to_years === 0)
                                    Din {{$category['lang']['subject']}} kan försäkras oavsett ålder. 
                                @else
                                    Din {{$category['lang']['subject']}} kan försäkras om den är över {{$insurance->insurable_from_weeks}} veckor och under {{$insurance->insurable_to_years}} år gammal.
                                @endif
                                Ersättningsbeloppet 
                                @if($insurance->compensation_amount_reduction_age === 0)
                                    minskas inte oavsett hur gammal din {{$category['lang']['subject']}} är. 
                                @else
                                    minskas {{\App\Format::amount($insurance->compensation_amount_reduction_kr)}} per år från att {{$category['lang']['the']}} är {{$insurance->compensation_amount_reduction_age}} år gammal.
                                @endif
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="35%" class="align-right">
                            <p>
                                <strong>Livförsäkring:</strong>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_life_insurance)) {
                                        echo '<i class="fa fa-star text-white" style="font-size: 24px;"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_life_insurance) < $insurance->rating_life_insurance) {
                                        echo '<i class="fas fa-star-half-alt text-white" style="font-size: 24px;"></i>';
                                }
                                for($i = ceil($insurance->rating_life_insurance) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-white" style="font-size: 24px;"></i>';
                                }
                                ?>
                            </p>
                            <p>
                                Livförsäkring kan tecknas hos {{$insurance->name}}. Livförsäkringen upphör när din {{$category['lang']['subject']}} fyller {{$insurance->life_insurance_expires}}.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="35%" class="align-right">
                            <p>
                                <strong>Pris:</strong>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_price)) {
                                        echo '<i class="fa fa-star text-white" style="font-size: 24px;"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_price) < $insurance->rating_price) {
                                        echo '<i class="fas fa-star-half-alt text-white" style="font-size: 24px;"></i>';
                                }
                                for($i = ceil($insurance->rating_price) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-white" style="font-size: 24px;"></i>';
                                }
                                ?>
                            </p>
                            <p>
                                Priset hos {{$insurance->name}} är individuellt. Betyget baseras på stickprovsundersökningar och kundberättelser.
                            </p>
                        </td>
                    </tr>
                </table>
    
            </div>
    
        </section>
    <section class="article">

        <div class="content info-article">

            @if(view()->exists('content.insurances.'.$category['slug'].'.'.$insurance->slug))
                <h2>{{$category['name']}} hos {{$insurance->name}}</h2>
                
                @include('content.insurances.'.$category['slug'].'.'.$insurance->slug)

                <br>
                <br>


            @else
                <center style="padding: 50px 0;">
                    Vi uppdaterar snart med en recension av {{$category['name']}} hos {{$insurance->name}}.
                </center>
            @endif


            <center>
                    @if(!empty($insurance->tracking_link))
                    <a href="/till/{{$category['slug']}}/{{$insurance->slug}}" target="_blank" rel="nofollow noopener" class="cta bg-success">Se ditt pris</a>
                    @endif
                <br>
                <br>
            </center>

        </div>

    </section>

    

    @include('modules.comments')

    @include('modules.contact')

    @include('modules.same')

    <script type="application/ld+json">
    {
        "@context": "http://schema.org/",
        "@type": "Review",
        "itemReviewed": {
        "@type": "Thing",
        "name": "{{$insurance->name}}"
        },
        "author": {
        "@type": "Organization",
        "name": "Försäkringarna.se",
        "url": "https://www.försäkringarna.se"
        },
        "reviewRating": {
        "@type": "Rating",
        "ratingValue": "{{$insurance->rating}}",
        "bestRating": "5",
        "worstRating": "1"
        }
    }
    </script>


@endsection