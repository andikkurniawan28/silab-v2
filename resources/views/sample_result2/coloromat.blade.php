@if(count($sample->coloromat->id) > 0)
    @if($sample->coloromat->is_verified == 1)
        <td>{{ $sample->coloromat->icumsa }}</td>
    @else
        <td>-</td>
    @endif
@else
    <td></td>
@endif

