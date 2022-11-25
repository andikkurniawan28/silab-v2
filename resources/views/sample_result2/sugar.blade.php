@if($sample->sugar->is_verified == 1)
    <td>{{ $sample->sugar->sulphur }}</td>
    <td>{{ $sample->sugar->diameter }}</td>
@else
    <td>-</td>
    <td>-</td>
@endif
