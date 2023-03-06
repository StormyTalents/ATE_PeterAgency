<table class="article-table">
        <tr>
            <td><strong>Högsta ersättningsbelopp:</strong></td>
            <td>
                @if($insurance->compensation_max_amount > 0)
                    {{number_format($insurance->compensation_max_amount,0,',',' ')}} kr
                @else 
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Sjukhusvistelse:</strong></td>
            <td>
                @if($insurance->hospital_stay_compensation > 0)
                    Ja, {{number_format($insurance->hospital_stay_compensation,0,',',' ')}} kr/dag
                    @if($insurance->hospital_stay_compensation_addition > 0)
                     + {{$insurance->hospital_stay_compensation_addition}} kr
                    @endif
                @elseif($insurance->hospital_stay_compensation === 0)
                    Nej
                @else 
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Medicinsk invaliditet:</strong></td>
            <td>
                @if($insurance->invalidity_compensation > 0)
                    Ja
                @elseif($insurance->invalidity_compensation === 0)
                    Nej
                @else 
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Ekonomisk invaliditet:</strong></td>
            <td>
                @if($insurance->economic_invalidity_compensation > 0)
                    Ja
                @elseif($insurance->economic_invalidity_compensation === 0)
                    Nej
                @else 
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Sveda och värk:</strong></td>
            <td>
                @if($insurance->pain_and_suffering > 0)
                    Ja
                @elseif($insurance->pain_and_suffering === 0)
                    Nej
                @else 
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Ärr:</strong></td>
            <td>
                @if($insurance->scars > 0)
                    Ja
                @elseif($insurance->scars === 0)
                    Nej
                @else 
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Dödsfall:</strong></td>
            <td>
                @if($insurance->death_compensation > 0)
                    Ja, {{number_format($insurance->death_compensation,0,',',' ')}} kr
                @else 
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: rgba(0,0,0,0.1);"></i>
                @endif
            </td>
        </tr>
    </table>