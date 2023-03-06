<!doctype html>
<html lang="se">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Du omdirigeras till {{$loan->slug}} – Försäkringarnna.se</title>

        <style>
            {!!\App\Asset::css('/css/app.css')!!}
        </style>
        <link rel="icon" href="/img/favicon.png">

        <meta name="robots" content="noindex,nofollow">

        <?php
        $canonical = \Request::path();
        ?>

        <link rel="canonical" href="{{str_replace('/index.php','', \URL::secure($canonical))}}">


    </head>
    <body>

        <section class="flex" style="height: 100vh; align-items: center;
        justify-content: center; background: #f5f5f5;">

            <div style="display: inline-block; padding: 50px 20px; width: 50%; max-width: 400px; min-width: 280px; text-align: center; background: #fff; color: #000; box-shadow: 0 10px 20px -10px rgba(0,0,0,0.2);">

                <img src="/assets/loans/c200x100/{{$loan->slug}}.cmp.jpg" alt="{{$loan->name}}" width="200" height="100" srcset="
                    /assets/loans/c200x100/{{$loan->slug}}.cmp.jpg 1x, 
                    /assets/loans/c400x200/{{$loan->slug}}.cmp.jpg 2x
                " alt="{{$loan->name}}">

                <p style="font-size: 28px;">
                    <i class="fas fa-spinner fa-pulse fa-fw text-danger"></i>
                </p>

                <p>
                    Du omdirigeras till {{$loan->name}}. <a href="?action=redirect" rel="nofollow" class="text-danger">Klicka här</a> om du inte omdirigeras inom några sekunder.
                </p>

            </div>

        </section>

        <script src="/js/jquery.min.js" type="text/javascript"></script>

        <script type="text/javascript">
        setTimeout(function() {
            window.location = "/out/{{$loan->slug}}?action=redirect";
        }, 1000);
        var percentage = 0;

        function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
            break;
            }
        }
        }
        </script>


        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700|Merriweather+Sans:800" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    </body>
</html>