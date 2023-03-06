@if(strlen($insurance->drawbacks) > 0 || strlen($insurance->benefits) > 0)
    <ul class="fa-ul" style="padding: 15px 0 !important; display: inline-block !important; text-align: center !important; font-size: 0.9em;">
        @if(strlen($insurance->benefits) > 0)
            @foreach(explode(';',$insurance->benefits) as $benefit)
            <li style="display: inline-block; padding: 0; margin: 5px 15px;"><span class="fa-li"><i class="fas fa-check-circle text-success"></i></span> {{$benefit}}</li>
            @endforeach
        @endif
        @if(strlen($insurance->drawbacks) > 0)
            @foreach(explode(';',$insurance->drawbacks) as $drawback)
            <li style="display: inline-block; padding: 0; margin: 5px 15px;"><span class="fa-li"><i class="fas fa-times-circle text-danger"></i></span> {{$drawback}}</li>
            @endforeach
        @endif
    </ul>
@endif  