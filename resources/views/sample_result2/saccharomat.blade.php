@if($method_id == 1)
    @if($sample->moisture->is_verified == 1)
        <td>{{ 100 - $sample->moisture->moisture }}</td>
        <td></td>
        <td></td>
    @else
        <td>-</td>
    @endif
@else
    @if($sample->saccharomat->is_verified == 1)
        <td>{{ $sample->saccharomat->percent_brix }}</td>
        <td>{{ $sample->saccharomat->percent_pol }}</td>
        <td>{{ $sample->saccharomat->purity }}</td>
    @else
        <td>-</td>
    @endif
@endif
