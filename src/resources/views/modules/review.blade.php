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


                    </div>
                    <div class="panel add-gap">
                        
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

                </div>
                <br>

                @if(!empty(\App\CMS::asHtml($content, 'suited_for')))

                <div class="row">
                    
                    
                    <div class="panel">

                        <h4>Passar dig som...</h4>
                        <div class="benefits-wrapper">
                            {!! \App\CMS::asHtml($content, 'suited_for') !!}
                        </div>

                          

                    </div>

                    <div class="panel">


                        <h4>Passar inte dig som...</h4>
                        <div class="drawbacks-wrapper">
                            {!! \App\CMS::asHtml($content, 'not_suited_for') !!}
                        </div>
                            

                    </div>

                </div>

                <br>

                @endif

                @if(!empty($insurance->tracking_link))
                <a href="/till/{{$category['slug']}}/{{$insurance->slug}}" target="_blank" rel="nofollow noopener" class="cta bg-success">Teckna försäkring</a>
            @else 
                <div style="display: inline-block; background: #fafafa; font-size: 0.8em; font-weight: 700; padding: 10px 15px;">Vi samarbetar inte med {{$insurance->name}}.</div>
            @endif

                

            </div>

            <p style="font-size: 12px; line-height: 1.25; color: #fff; margin: 0 auto; max-width: 70%; min-width: 280px; margin-top: 25px;">
                Informationen om försäkringen hämtas automatiskt från försäkringsbolagets hemsida. Senaste uppdateringen gjordes {{$insurance->updated_at}}. Om villkoren avviker från de villkor som försäkringsbolaget presenterar är det försäkringbolagets villkor som gäller.   
            </p>

        </div>

    </section>

    <section class="article bg-info">
    
        <div class="content align-left">

            <h1>{{$insurance->name}} {{mb_strtolower($category['name'])}}</h1>

            {!! \App\CMS::asHtml($content, 'intro') !!}

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

                {!! \App\CMS::asHtml($content, 'extent') !!}


                @if(view()->exists('modules.extent.' . $category['slug']))
                <h3>Vad ersätts?</h3>
                
                
                @include('modules.extent.' . $category['slug'])
                @endif

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
            
            {!! \App\CMS::asHtml($content, 'terms') !!}


        </div>

    </section>


    <section class="article" style="background: #f9f9f9;">
    
            <div class="content align-left">
    
                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1.5em;">
                    <h2 style="margin: 0; padding: 0;">Pris och försäkringsbelopp</h2>
                    <div style="">
                        <div class="rating-box"><span class="inner bg-success">
                            {{number_format($insurance->rating_price,1,'.','')}}<span class="unit">/5</span>
                        </span></div>
                    </div>
                </div>
                
                {!! \App\CMS::asHtml($content, 'price') !!}
    
    
            </div>
    
        </section>

        <section class="article bg-info">
    
                <div class="content align-left">
        
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1.5em;">
                        <h2 class="text-white" style="margin: 0; padding: 0;">Fördelar</h2>
                    </div>
                    
                    {!! \App\CMS::asHtml($content, 'benefits') !!}
        
        
                </div>
        
            </section>
        

    <section class="article">

        <div class="content info-article">

                
            {!! \App\CMS::asHtml($content, 'detailed') !!}

            <br>
            <br>


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
        "@type": "Product",
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