@if($sample->moisture->is_verified == 1)
    <td>{{ $sample->moisture->moisture }}</td>
@elseif($sample->moisture->is_verified == NULL)
    <td>-</td>
@endif
