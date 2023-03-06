@if($insurance->trustpilot_rating_count > 0)
<div style="padding: 10px 10%; background: #fff;" class="align-center">
    <p>
        {{$insurance->name}} har <strong style="padding: 0 5px;"><img src="/assets/img/108x108/trustpilot.png" alt="Trustpilot" width="18" height="18" style="position: relative; bottom: -3px;"> {{number_format($insurance->trustpilot_rating,1,'.',' ')}} av 5</strong> i betyg hos Trustpilot ({{$insurance->trustpilot_rating_count}} omdömen)
    </p>
        
</div>
@endif

<section class="article bg-info">

        <div class="content">

            <h2 class="align-center text-white">Mer om {{$insurance->name}}</h2>

            <div class="flex">

                <div class="panel">
                    <h3>Kontaktuppgifter</h3>
                    <br>
                    <table>
                        <tr>
                            <td class="align-right"><strong>Adress:</strong></td>
                            <td class="align-left">{{!empty($insurance->address) ? $insurance->address : '–'}}</td>
                        </tr>
                        <tr>
                            <td class="align-right"><strong>Postort:</strong></td>
                            <td class="align-left">{{!empty($insurance->zip) && !empty($insurance->city) ? ($insurance->zip . ' ' . $insurance->city) : '–'}}</td>
                        </tr>
                        <tr>
                            <td class="align-right"><strong>Telefon:</strong></td>
                            <?php
                            $number = $insurance->phone;
                            $number = preg_replace('/(08)(\d{3})(\d{2})(\d+)/i', "$1-$2 $3 $4", $number);
                            $number = preg_replace('/(077\d)(\d{3})(\d{3})/i', "$1-$2 $3", $number);
                            $number = preg_replace('/(\d{3})(\d{3})(\d{2})(\d{2})/i', "$1-$2 $3 $4", $number);
                            $number = preg_replace('/(\d{3})(\d{3})(\d+)/i', "$1-$2 $3", $number);
                            ?>
                            <td class="align-left">{{!empty($number) ? $number : '–'}}</td>
                        </tr>
                        <tr>
                            <td class="align-right"><strong>E-post:</strong></td>
                            <td class="align-left">{{!empty($insurance->email) ? $insurance->email : '–'}}</td>
                        </tr>
                    </table>
                </div>

                <div class="panel">
                    <h3>Öppettider</h3>
                    <br>
                    <table width="100%">

                    <?php

                    $days = [
                        
                        1 => [
                            'id' => 'monday',
                            'name' => 'måndag',
                        ],
                        2 => [
                            'id' => 'tuesday',
                            'name' => 'tisdag',
                        ],
                        3 => [
                            'id' => 'wednesday',
                            'name' => 'onsdag',
                        ],
                        4 => [
                            'id' => 'thursday',
                            'name' => 'torsdag',
                        ],
                        5 => [
                            'id' => 'friday',
                            'name' => 'fredag',
                        ],
                        6 => [
                            'id' => 'saturday',
                            'name' => 'lördag',
                        ],
                        0 => [
                            'id' => 'sunday',
                            'name' => 'söndag',
                        ],


                    ];

                    $open_now = false;

                    ?>

                    @foreach($days as $num => $info)

                    <?php
                    $presented = isset($insurance['open_' . $info['id']]) ? $insurance['open_' . $info['id']] : '–';
                    if(strlen($presented) < 4) $presented = 'Stängt';

                    $opens = false;
                    $closes = false;
                    if(preg_match('/(?<opens>\d{1,2}:\d{2}).{0,15}?(?<closes>\d{1,2}:\d{2})/i', $presented, $hit)) {
                        $opens = $hit['opens'];
                        $closes = $hit['closes'];
                    }
                    ?>    


                            <tr>
                                <td width="50%" class="align-right"><strong>{{ucfirst($info['name'])}}:</strong></td>
                                <td class="align-left">
                                    
                                    @if($opens && $closes)
                                    <time>{{$opens}}</time> – <time>{{$closes}}</time>
                                    @else 
                                    <time>Stängt</time>
                                    @endif
                                    
                                </td>
                                    
                            </tr>


                    @endforeach

                    </table>
                </div>

            </div>
            
        </div>

    </section>


