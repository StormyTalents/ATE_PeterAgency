<div class="box">
    <div class="table">
        <div class="row">
            <div class="col col-3 align-center">
                <a href="/{{$category['slug']}}/{{$insurance->slug}}"><img class="lazy" src="/img/placeholder.png" data-src="/assets/logos/c150x75/{{$insurance->slug}}.comp.jpg" alt="{{$insurance->name}} {{$category['name']}}" width="150" height="75" alt="{{$insurance->name}}" data-srcset="
                    /assets/logos/c150x75/{{$insurance->slug}}.comp.jpg 1x, 
                    /assets/logos/c300x150/{{$insurance->slug}}.comp.jpg 2x,
                    /assets/logos/c450x300/{{$insurance->slug}}.comp.jpg 3x
                "></a>
            </div>

            <div class="col col-4 align-center">      
                <div class="inline-block-mobile"> 
                    <ul class="fa-ul">
                        @if(strlen($insurance->benefits) > 0)
                            @foreach(explode(';',$insurance->benefits) as $benefit)
                            <li><span class="fa-li"><i class="fas fa-check-circle text-success"></i></span> {{$benefit}}</li>
                            @endforeach
                        @endif
                        @if(strlen($insurance->drawbacks) > 0)
                            @foreach(explode(';',$insurance->drawbacks) as $drawback)
                            <li><span class="fa-li"><i class="fas fa-times-circle text-danger"></i></span> {{$drawback}}</li>
                            @endforeach
                        @endif
                    </ul>
                    
                </div>
            </div>
            
            <div class="col col-5 align-center td-bg-white">         
                <table>
                    <tr>
                        <td width="50%" style="text-align: right;"><strong>Veterinärvård:</strong></td>
                        <td>
                            <?php for($i = 1; $i <= 5; $i++) {
                                if($i <= floor($insurance->rating_veterinary)) {
                                    echo '<i class="fa fa-star text-yellow"></i>';
                                }
                                
                            }
                            if(floor($insurance->rating_veterinary) < $insurance->rating_veterinary) {
                                    echo '<i class="fas fa-star-half-alt text-yellow"></i>';
                            }
                            for($i = ceil($insurance->rating_veterinary) + 1; $i <= 5; $i++) {
                                echo '<i class="far fa-star text-yellow"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: right;"><strong>Självrisk:</strong></td>
                        <td>
                            <?php for($i = 1; $i <= 5; $i++) {
                                if($i <= floor($insurance->rating_deductible)) {
                                    echo '<i class="fa fa-star text-yellow"></i>';
                                }
                                
                            }
                            if(floor($insurance->rating_deductible) < $insurance->rating_deductible) {
                                    echo '<i class="fas fa-star-half-alt text-yellow"></i>';
                            }
                            for($i = ceil($insurance->rating_deductible) + 1; $i <= 5; $i++) {
                                echo '<i class="far fa-star text-yellow"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: right;"><strong>Pris:</strong></td>
                        <td>
                            <?php for($i = 1; $i <= 5; $i++) {
                                if($i <= floor($insurance->rating_price)) {
                                    echo '<i class="fa fa-star text-yellow"></i>';
                                }
                                
                            }
                            if(floor($insurance->rating_price) < $insurance->rating_price) {
                                    echo '<i class="fas fa-star-half-alt text-yellow"></i>';
                            }
                            for($i = ceil($insurance->rating_price) + 1; $i <= 5; $i++) {
                                echo '<i class="far fa-star text-yellow"></i>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                
            </div>
            
        </div>
                            
        
    </div>
    <div class="table">

        <div class="row actions align-center">
            <div class="col col-12 align-center">

                <a href="/{{$category['slug']}}/{{$insurance->slug}}" class="cta bg-none">Läs recension</a>
                @if(!empty($insurance->tracking_link))
                    <a href="/till/{{$category['slug']}}/{{$insurance->slug}}" target="_blank" rel="nofollow noopener" class="cta bg-success">Se ditt pris</a>
                @endif

            </div>
        </div>  

    </div>

</div>