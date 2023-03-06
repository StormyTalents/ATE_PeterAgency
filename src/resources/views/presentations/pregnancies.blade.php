@extends('app')
@section('content')

    <section class="top">

        <div class="content">


            @include('modules.breadcrumbs')
            
            <div class="listing">


                <div class="row">
                    <div class="panel add-gap">
                        
                        <h1>{{$insurance->name}} {{mb_strtolower($category['name'])}}</h1>
                        
                                                

                        <?php /*
                        <div class="rating">
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                            <i class="fa fa-star text-yellow"></i>
                        </div>
                        */ ?>
                        
                    </div>
                </div>


                <div class="row">
                    
                    <div class="panel">
                        <table>
                            <tr>
                                <td width="50%" style="text-align: right;"><strong>Ersättning vid sjukhusvistelse:</strong></td>
                                <td>
                                    @if($insurance->hospital_stay_compensation > 0)
                                    {{number_format($insurance->hospital_stay_compensation,0,',',' ')}} kr/dag
                                    @else 
                                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: right;"><strong>Ersättning vid diagnos:</strong></td>
                                <td>
                                    @if($insurance->diagnosis_compensation > 0)
                                    {{number_format($insurance->diagnosis_compensation,0,',',' ')}} kr
                                    @else 
                                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: right;"><strong>Ersättning vid invaliditet:</strong></td>
                                <td>
                                    @if($insurance->invalidity_compensation_amount > 0)
                                    Upp till {{number_format($insurance->invalidity_compensation_amount,0,',',' ')}} kr
                                    @else 
                                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: right;"><strong>Ersättning vid dödsfall:</strong></td>
                                <td>
                                    @if($insurance->life_insurance_amount > 0)
                                    {{number_format($insurance->life_insurance_amount,0,',',' ')}} kr
                                    @else 
                                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: right;"><strong>Utan självrisk:</strong></td>
                                <td>
                                    @if($insurance->without_deductible == 1)
                                    <i class="fa fa-check-circle text-success"></i> Ja
                                    @else 
                                    <i class="fa fa-times-circle text-danger"></i> Nej
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

                        

                        
                        <span class="rating">
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
                        </span>

                        
                    
                        <p>
                            <br>
                            @if(!empty($insurance->tracking_link))
                                <a href="/till/{{$category['slug']}}/{{$insurance->slug}}" target="_blank" rel="nofollow noopener" class="cta bg-success">Teckna försäkring</a>
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