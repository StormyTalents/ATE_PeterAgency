<table class="article-table">
        <tr>
            <td><strong>Ersättning lösöre:</strong></td>
            <td>
                @if($insurance->goods_compensation_minimum > 0 && $insurance->goods_compensation > 0)
                    {{number_format($insurance->goods_compensation_minimum,0,',',' ')}} / {{number_format($insurance->goods_compensation,0,',',' ')}} kr
                @elseif($insurance->goods_compensation_minimum > 0)
                    {{number_format($insurance->goods_compensation_minimum,0,',',' ')}} kr eller högre
                @elseif($insurance->goods_compensation > 1)
                    Upp till {{number_format($insurance->goods_compensation,0,',',' ')}} kr
                @elseif($insurance->goods_compensation === 1)
                    Valfritt belopp
                @else
                    <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Allrisk (drulle):</strong></td>
            <td>
                @if($insurance->comprehensive_compensation > 0)
                Upp till {{number_format($insurance->comprehensive_compensation,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Stöld utanför bostaden:</strong></td>
            <td>
                @if($insurance->theft_away_compensation > 0)
                Upp till {{number_format($insurance->theft_away_compensation,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Rättshjälp:</strong></td>
            <td>
                @if($insurance->legal_aid_compensation > 0)
                Upp till {{number_format($insurance->legal_aid_compensation,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Ansvarsförsäkring:</strong></td>
            <td>
                @if($insurance->liability_compensation > 0)
                Upp till {{number_format($insurance->liability_compensation,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Ersättning för cykel:</strong></td>
            <td>
                @if($insurance->bike_compensation > 0)
                Upp till {{number_format($insurance->bike_compensation,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Ersättning vid överfall:</strong></td>
            <td>
                @if($insurance->assault_compensation > 0)
                Upp till {{number_format($insurance->assault_compensation,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Reseskydd:</strong></td>
            <td>
                @if($insurance->travel_days > 0)
                {{number_format($insurance->travel_days,0,',',' ')}} dagar
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Ersättning vid ID-stöld:</strong></td>
            <td>
                @if($insurance->id_theft_compensation > 0)
                Upp till {{number_format($insurance->id_theft_compensation,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Grundsjälvrisk:</strong></td>
            <td>
                @if($insurance->deductible_default > 0)
                {{number_format($insurance->deductible_default,0,',',' ')}} kr
                @else 
                <i class="fa fa-question-circle" title="Vi saknar denna uppgift" style="font-size: 1em; color: #aaa;"></i>
                @endif
            </td>
        </tr>
    </table>