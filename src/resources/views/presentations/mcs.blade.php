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
                        <table class="slim-table">
                        <tr>
                            <td style="text-align: right;"></td>
                            <td style="text-align: center;">
                                <strong>Trafik</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>Halv</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>Hel</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Trafikförsäkring:</strong></td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Brand:</strong></td>
                            <td style="text-align: center;">
                                <i class="fa fa-times-circle text-danger"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Glas:</strong></td>
                            <td style="text-align: center;">
                                <i class="fa fa-times-circle text-danger"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Maskinskada:</strong></td>
                            <td style="text-align: center;">
                                <i class="fa fa-times-circle text-danger"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Stöld:</strong></td>
                            <td style="text-align: center;">
                                <i class="fa fa-times-circle text-danger"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Räddning:</strong></td>
                            <td style="text-align: center;">
                                <i class="fa fa-times-circle text-danger"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><strong>Vagnskada:</strong></td>
                            <td style="text-align: center;">
                                <i class="fa fa-times-circle text-danger"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-times-circle text-danger"></i>
                            </td>
                            <td style="text-align: center;">
                                <i class="fa fa-check-circle text-success"></i>
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

    <section class="article bg-info">
    
            <div class="content align-center">
    
                <h2 class="text-white">Självrisker</h2>
    
    
                <table>
                    <tr>
                        <td width="50%" class="align-right">
                            <strong>Trafikförsäkring:</strong>
                        </td>
                        <td>
                            <span style="font-size: 1.2em;">
                                @if(is_numeric($insurance->deductible_traffic))
                                {{number_format($insurance->deductible_traffic,0,',',' ')}} kr
                                @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift."></i>
                                @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" class="align-right">
                            <strong>Maskinskada:</strong>
                        </td>
                        <td>
                            <span style="font-size: 1.2em;">
                                @if(is_numeric($insurance->deductible_equipment))
                                {{number_format($insurance->deductible_equipment,0,',',' ')}} kr
                                @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift."></i>
                                @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" class="align-right">
                            <strong>Glas:</strong>
                        </td>
                        <td>
                            <span style="font-size: 1.2em;">
                                @if(is_numeric($insurance->deductible_glass))
                                {{number_format($insurance->deductible_glass,0,',',' ')}} kr
                                @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift."></i>
                                @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" class="align-right">
                            <strong>Brand:</strong>
                        </td>
                        <td>
                            <span style="font-size: 1.2em;">
                                @if(is_numeric($insurance->deductible_fire))
                                {{number_format($insurance->deductible_fire,0,',',' ')}} kr
                                @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift."></i>
                                @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" class="align-right">
                            <strong>Räddning:</strong>
                        </td>
                        <td>
                            <span style="font-size: 1.2em;">
                                @if(is_numeric($insurance->deductible_rescue))
                                {{number_format($insurance->deductible_rescue,0,',',' ')}} kr
                                @else 
                                <i class="fa fa-question-circle" title="Vi saknar denna uppgift."></i>
                                @endif
                            </span>
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