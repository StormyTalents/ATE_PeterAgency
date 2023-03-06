@extends('app')

@section('content')

<section class="top"
    @if(isset($category['slug']))
        style="background: url('/assets/img/1000x400/{{$category['slug']}}.jpg'); background-size: cover; background-position: top center;"
    @endif
>

    <div class="content">
        <h1>{{$h1}}</h1>
        @if(isset($insurances))
            <p style="padding-right: 15%; padding-left: 15%;">
                <strong>Vilken {{mb_strtolower($category['name'])}} ska jag välja?</strong> Här jämför vi {{$insurances->count()}} försäkringsbolag så att du ska kunna hitta {{mb_strtolower($best_pick)}}.
            </p>
        @elseif(isset($short_text))
            <p style="padding-right: 15%; padding-left: 15%;">
               {!!$short_text!!} 
            </p>
        @endif
    </div>

</section>

@if(isset($insurances))
<section class="products">

    <div class="content">

        <h2>{{$best_pick}}</h2>

        @foreach($insurances->offset(0)->limit(1)->get() as $insurance)

            @include($listing_view, [$insurance,$category])

        @endforeach


        <h2 class="space">{{$other}}</h2>

        @foreach($insurances->offset(1)->limit(1000)->get() as $insurance)

            @include($listing_view, [$insurance,$category])

        @endforeach

    </div>

</section>
@endif

@if(isset($box_navigation) && $box_navigation)
<section class="article" style="background: #f9f9f9;">
    
    <div class="content">

        <h2>Vilken försäkring vill du teckna?</h2>


        <div class="space-between">
            <a href="/hemforsakring" class="link-box">
                <h3>Hemförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/hemforsakring_mini.jpg" alt="Hemförsäkring">
            </a>
            <a href="/villaforsakring" class="link-box">
                <h3>Villaförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/villaforsakring.jpg" alt="Villaförsäkring">
            </a>
            <a href="/bilforsakring" class="link-box">
                <h3>Bilförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/bilforsakring.jpg" alt="Bilförsäkring">
            </a>
            <a href="/kattforsakring" class="link-box">
                <h3>Kattförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/kattforsakring.jpg" alt="Kattförsäkring">
            </a>
            <a href="/hundforsakring" class="link-box">
                <h3>Hundförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/hundforsakring-mini.jpg" alt="Hundförsäkring">
            </a>
            <a href="/foretagsforsakring" class="link-box">
                <h3>Företagsförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/foretagsforsakring.jpg" alt="Företagsförsäkring">
            </a>
            <a href="/olycksfallsforsakring" class="link-box">
                <h3>Olycksfallsförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/olycksfallsforsakring.jpg" alt="Olycksfallsförsäkring">
            </a>
            <a href="/inkomstforsakring" class="link-box">
                <h3>Inkomstförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/inkomstforsakring.jpg" alt="Inkomstförsäkring">
            </a>
            
            <a href="/gravidforsakring" class="link-box">
                <h3>Gravidförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/gravidforsakring.jpg" alt="Gravidförsäkring">
            </a>
            <a href="/mc-forsakring" class="link-box">
                <h3>MC-försäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/mc-forsakring.jpg" alt="MC-försäkring">
            </a>
            <a href="/batforsakring" class="link-box">
                <h3>Båtförsäkring</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/batforsakring.jpg" alt="Båtförsäkring">
            </a>
            <a href="/id-skydd" class="link-box">
                <h3>ID-skydd</h3>
                <img class="lazy" src="/img/placeholder.png" data-src="/assets/img/260x160/id-skydd.jpg" alt="ID-skydd">
            </a>
        </div>

    </div>

</section>
@endif



    @if(isset($content))
        {!!$content!!}
    @else
        @include('content.' . $content_view)
    @endif


@endsection