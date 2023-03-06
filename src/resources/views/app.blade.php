<!doctype html>
<html lang="se">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}} » Försäkringarna.se</title>

        <style>
            {!!\App\Asset::css('/css/app.css')!!}
        </style>
        <link rel="icon" href="/img/favicon.png">
        <meta name="format-detection" content="telephone=no">

        <?php
        $canonical = \Request::path();
        ?>

        @if(isset($meta_description))
        <meta name="description" content="{{$meta_description}}">
        @endif

        <link rel="canonical" href="{{str_replace('/index.php','', \URL::secure($canonical))}}">

        <meta name="google-site-verification" content="69SI3DYSh9_rxfDJdQNtFcj46OyUYH-0DcbVcCymsr4" />

    </head>
    <body>

        <header class="header">
            <div class="content">
                <a href="/"><img src="/img/forsakringarna.se.png" height="40" alt="Försäkringarna.se"></a>

                <nav class="menu" id="menu" style="color: #fff;" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <ul>
                        <li itemprop="name"><a itemprop="url" href="#">Egendom</a>
                        <ul class="dropdown">
                            <?php
                            $items = [
                                'property' => [
                                    'hemforsakring' => 'Hemförsäkring',
                                    'villaforsakring' => 'Villaförsäkring',
                                    'bilforsakring' => 'Bilförsäkring',
                                    'batforsakring' => 'Båtförsäkring',
                                    'mc-forsakring' => 'MC-försäkring',
                                ],
                                'person' => [
                                    'olycksfallsforsakring' => 'Olycksfallsförsäkring',
                                    'inkomstforsakring' => 'Inkomstförsäkring',
                                    'gravidforsakring' => 'Gravidförsäkring',
                                    'barnforsakring' => 'Barnförsäkring',
                                    'id-skydd' => 'ID-skydd',
                                ],
                                'animal' => [
                                    'kattforsakring' => 'Kattförsäkring',
                                    'hundforsakring' => 'Hundförsäkring',
                                ],
                                'business' => [
                                    'foretagsforsakring' => 'Företagsförsäkring',
                                ],
                            ];

                            ?>
                            @foreach($items['property'] as $url => $name)
                            <li itemprop="name"><a itemprop="url" href="/{{$url}}">{{$name}}</a></li>
                            @endforeach
                        </ul></li>
                        <li itemprop="name"><a itemprop="url" href="#">Person</a>
                        <ul class="dropdown">
                            @foreach($items['person'] as $url => $name)
                            <li itemprop="name"><a itemprop="url" href="/{{$url}}">{{$name}}</a></li>
                            @endforeach
                        </ul></li>
                        <li itemprop="name"><a itemprop="url" href="#">Djur</a>
                        <ul class="dropdown">

                            @foreach($items['animal'] as $url => $name)
                            <li itemprop="name"><a itemprop="url" href="/{{$url}}">{{$name}}</a></li>
                            @endforeach
                        </ul></li>
                        <li itemprop="name"><a itemprop="url" href="#">Företag</a>
                            <ul class="dropdown">

                                @foreach($items['business'] as $url => $name)
                                <li itemprop="name"><a itemprop="url" href="/{{$url}}">{{$name}}</a></li>
                                @endforeach
                        </ul></li>
                        <li itemprop="name"><a itemprop="url" href="/om-oss">Om oss</a></li>
                    </ul>
                </nav>
                <div class="menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></div>



            </div>
        </header>

        @yield('content')



    <footer class="footer" id="footer">

    <div class="content">

        <div class="box" style="text-align: center;">
            <a href="https://www.uc.se/risksigill2?showorg=559038-4052&language=swe" title="Sigillet är utfärdat av UC AB. Klicka på bilden för information om UC:s Riskklasser." target="_blank" rel="noopener nofollow"><img class="lazy" src="/images/placeholder.webp" data-src="https://www.uc.se/ucsigill2/sigill?org=559038-4052&language=swe&product=psa&fontcolor=w&type=svg" width="160"></a>
        </div>

        <div class="box">
            &copy; {{date("Y")}} <strong>Veloxia AB</strong>
            <p>
                Veloxia AB tillhandahåller ett flertal jämförelsetjänster på nätet.
            </p>
        </div>

        <div class="box">

            <strong>Egendomsförsäkringar</strong>
            @foreach($items['property'] as $url => $name)
            <a href="/{{$url}}">{{$name}}</a>
            @endforeach

        </div>

        <div class="box">

            <strong>Personförsäkringar</strong>
            @foreach($items['person'] as $url => $name)
            <a href="/{{$url}}">{{$name}}</a>
            @endforeach

        </div>

        <div class="box">

            <strong>Djurförsäkringar</strong>
            @foreach($items['animal'] as $url => $name)
            <a href="/{{$url}}">{{$name}}</a>
            @endforeach

        </div>

        <div class="box">

            <strong>Information</strong>
            <a href="/om-oss">Om oss</a>

        </div>

    </div>

    <div class="bottom">

        <script type="application/ld+json" id="/#lanen" itemid="/#lanen">
            { "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Försäkringarna.se",
            "parentOrganization" : {
                "@type": "Organization",
                "name": "Veloxia",
                "legalName": "Veloxia AB",
                "vatID" : "SE559038405201",
                "url" : "https://www.veloxia.se",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://www.veloxia.se/veloxia-md.png",
                    "width": 162,
                    "height":60
                }
            },
            "description" : "Försäkringarna.se hjälper dig att hitta rätt försäkring.",
            "url": "https://www.försäkringarna.se",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Box 1392",
                "addressLocality": "Stockholm",
                "postalCode": "11674",
                "addressCountry": "Sweden"
            }
        }

        </script>

        <span>Org.nr.<strong>559038-4052</strong></span>
        <span>Postadress<strong>Box 1392, 116 74 Stockholm</strong></span>
        <span>Momsreg.nr.<strong>SE559038-405201</strong></span>
        <span>Telefonnummer<strong>08 – 520 275 95</strong></span>
        <span>E-postadress<strong>support@veloxia.se</strong></span>


    </div>

    </footer>

        <script src="/js/jquery.min.js" type="text/javascript" async defer></script>

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Montserrat:800" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134757277-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-134757277-1');
        </script>

        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1975116089443198');
        fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1"
        src="https://www.facebook.com/tr?id=1975116089443198&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    </body>
</html>
