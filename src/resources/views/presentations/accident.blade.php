@extends('app')
@section('content')

    <section class="top">

        <div class="content">

            @include('modules.breadcrumbs')
            
            <div class="listing">


                <div class="row">
                    <div class="panel add-gap">
                        
                        <img src="/assets/logos/c200x100/{{$insurance->slug}}.png" alt="{{$insurance->name}} {{$category['name']}}" width="200" height="100" alt="{{$insurance->name}}" srcset="
                            /assets/logos/c200x100/{{$insurance->slug}}.png 1x, 
                            /assets/logos/c400x200/{{$insurance->slug}}.png 2x,
                            /assets/logos/c600x300/{{$insurance->slug}}.png 3x
                        ">

                        <br> 

                        @include('modules.presentation-benefits')

                    </div>
                </div>


                <div class="row">
                    
                    <div class="panel">

                    
                    <table>
                        <tr>
                            <td width="50%" style="text-align: right;"><strong>Omfattning:</strong></td>
                            <td>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_extent)) {
                                        echo '<i class="fa fa-star text-yellow"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_extent) < $insurance->rating_extent) {
                                        echo '<i class="fas fa-star-half-alt text-yellow"></i>';
                                }
                                for($i = ceil($insurance->rating_extent) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-yellow"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: right;"><strong>Villkor:</strong></td>
                            <td>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating_terms)) {
                                        echo '<i class="fa fa-star text-yellow"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating_terms) < $insurance->rating_terms) {
                                        echo '<i class="fas fa-star-half-alt text-yellow"></i>';
                                }
                                for($i = ceil($insurance->rating_terms) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-yellow"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: right;"><strong>Slutbetyg:</strong></td>
                            <td>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    if($i <= floor($insurance->rating)) {
                                        echo '<i class="fa fa-star text-yellow"></i>';
                                    }
                                    
                                }
                                if(floor($insurance->rating) < $insurance->rating) {
                                        echo '<i class="fas fa-star-half-alt text-yellow"></i>';
                                }
                                for($i = ceil($insurance->rating) + 1; $i <= 5; $i++) {
                                    echo '<i class="far fa-star text-yellow"></i>';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php /*
                        <tr>
                            <td width="50%" style="text-align: right;"><strong>Utan självrisk:</strong></td>
                            <td>
                                @if($insurance->without_deductible == 1)
                                <i class="fa fa-check-circle text-success"></i> Ja
                                @else 
                                <i class="fa fa-times-circle text-danger"></i> Nej
                                @endif
                            </td>
                        </tr> */ ?>
                    </table>
                        
                        

                    </div>
                    <div class="panel">

                            

                        

                        
                        
                    
                            @if(!empty($insurance->tracking_link))
                                <a href="/till/{{$category['slug']}}/{{$insurance->slug}}" target="_blank" rel="nofollow noopener" class="cta bg-success">Teckna försäkring</a>
                            @else 
                                <div style="display: inline-block; background: #fafafa; font-size: 0.8em; font-weight: 700; padding: 10px 15px;">Vi samarbetar inte med {{$insurance->name}}.</div>
                            @endif

                    </div>

                </div>

                

            </div>

            <p style="font-size: 12px; line-height: 1.25; color: #fff; margin: 0 auto; max-width: 70%; min-width: 280px; margin-top: 25px;">
                Informationen om försäkringen hämtas automatiskt från försäkringsbolagets hemsida. Senaste uppdateringen gjordes {{$insurance->updated_at}}. Om villkoren avviker från de villkor som försäkringsbolaget presenterar är det försäkringbolagets villkor som gäller.   
            </p>

        </div>

    </section>

    <section class="article bg-info">
    
        <div class="content align-left">

            <h1>{{$insurance->name}} {{mb_strtolower($category['name'])}}</h1>

            {!! $insurance->introduction!!}

        </div>

    </section>


    

    <section class="article" style="background: #f9f9f9;">
    
            <div class="content align-left">

                <div style="display: flex; align-items: center; justify-content: space-between; margin: 1.5em 0;">
                    <h2 style="margin: 0; padding: 0;">Omfattning</h2>
                    <div>
                        <div class="rating-box"><span class="inner bg-success">
                            {{number_format($insurance->rating_extent,1,'.','')}}<span class="unit">/5</span>
                        </span></div>
                    </div>
                </div>

                {!! $insurance->comment_extent !!}

                <h3>Vad ersätts?</h3>
    
                <table class="article-table">
                    <tr>
                        <td><strong>Högsta ersättningsbelopp:</strong></td>
                        <td>
                            @if($insurance->compensation_max_amount > 0)
                                {{number_format($insurance->compensation_max_amount,0,',',' ')}} kr
                            @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Sjukhusvistelse:</strong></td>
                        <td>
                            @if($insurance->hospital_stay_compensation > 0)
                                Ja, {{number_format($insurance->hospital_stay_compensation,0,',',' ')}} kr/dag
                                @if($insurance->hospital_stay_compensation_addition > 0)
                                 + {{$insurance->hospital_stay_compensation_addition}} kr
                                @endif
                            @elseif($insurance->hospital_stay_compensation === 0)
                                Nej
                            @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Medicinsk invaliditet:</strong></td>
                        <td>
                            @if($insurance->invalidity_compensation > 0)
                                Ja
                            @elseif($insurance->invalidity_compensation === 0)
                                Nej
                            @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Ekonomisk invaliditet:</strong></td>
                        <td>
                            @if($insurance->economic_invalidity_compensation > 0)
                                Ja
                            @elseif($insurance->economic_invalidity_compensation === 0)
                                Nej
                            @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Sveda och värk:</strong></td>
                        <td>
                            @if($insurance->pain_and_suffering > 0)
                                Ja
                            @elseif($insurance->pain_and_suffering === 0)
                                Nej
                            @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Ärr:</strong></td>
                        <td>
                            @if($insurance->scars > 0)
                                Ja
                            @elseif($insurance->scars === 0)
                                Nej
                            @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Dödsfall:</strong></td>
                        <td>
                            @if($insurance->death_compensation > 0)
                                Ja, {{number_format($insurance->death_compensation,0,',',' ')}} kr
                            @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                            @endif
                        </td>
                    </tr>
                </table>

            </div>
    
    
        </section>
    



    <section class="article bg-info">
    
        <div class="content align-left">

            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1.5em;">
                <h2 class="text-white" style="margin: 0; padding: 0;">Villkor</h2>
                <div style="">
                    <div class="rating-box"><span class="inner bg-success">
                        {{number_format($insurance->rating_terms,1,'.','')}}<span class="unit">/5</span>
                    </span></div>
                </div>
            </div>
            
            {!! $insurance->comment_terms !!}


        </div>

    </section>


    <?php /*
    <section class="article" style="background: #f9f9f9;">
    
            <div class="content align-center">
    
                <h2>Hur mycket kostar {{$insurance->name}} {{mb_strtolower($category['name'])}}?</h2>

                <br>
    
                <table>
                    <tr>
                        <td width="50%" style="text-align: right;"><strong>1 person:</strong></td>
                        <td>
                            @if($insurance->price_1p > 0)
                                {{$insurance->price_1p}} kr/mån
                            @else
                                Individuellt
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: right;"><strong>2 personer:</strong></td>
                        <td>
                            @if($insurance->price_2p > 0)
                                {{$insurance->price_2p}} kr/mån
                            @else
                                Individuellt
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: right;"><strong>3 personer:</strong></td>
                        <td>
                            @if($insurance->price_3p > 0)
                                {{$insurance->price_3p}} kr/mån
                            @else
                                Individuellt
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: right;"><strong>4 personer:</strong></td>
                        <td>
                            @if($insurance->price_4p > 0)
                                {{$insurance->price_4p}} kr/mån
                            @else
                                Individuellt
                            @endif
                        </td>
                    </tr>
                </table>
    
            </div>
    
        </section>
    
    */ ?>

    <section class="article">

        <div class="content info-article">

            @if(view()->exists('content.insurances.'.$category['slug'].'.'.$insurance->slug))
                <h2>{{$category['name']}} från {{$insurance->name}}</h2>
                
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