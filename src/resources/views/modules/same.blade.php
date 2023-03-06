<section class="article">
    
    <div class="content">

        <h2 class="align-center">Andra försäkringar från {{$insurance->name}}</h2>

        <?php $num = 0; ?>
        <div class="space-between" style="text-align: left;">

            @foreach($all_models as $slug => $model)
                <?php $same = '\\App\\' . $model; ?>
                @if($category['slug'] != $slug && $same::where('slug','=',$insurance->slug)->count() == 1)
                <a href="/{{$slug}}/{{$insurance->slug}}" class="link-box">
                    <h3>{{$insurance->name}}<br>{{$all_content[$slug]['name']}}</h3>
                    <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/{{$slug}}.jpg" alt="{{$all_content[$slug]['name']}} från {{$insurance->name}}">
                </a>
                <?php $num++; ?>
                @endif
            @endforeach

            @if($num == 0)

                <p class="align-center" style="width: 100% !important;">
                    Vi känner inte till några andra försäkringar från {{$insurance->name}}.
                </p>

            @endif
                        
        </div>
        

    </div>

</section>