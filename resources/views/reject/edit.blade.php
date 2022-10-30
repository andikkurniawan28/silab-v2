@foreach($rejects as $reject)
<div class="modal fade" id="edit{{ $reject->id }}" tabindex="-1" reject="dialog" aria-labelledby="edit{{ $reject->id }}Label" aria-hidden="true">
    <div class="modal-dialog" reject="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $reject->id }}Label">Edit {{ ucfirst('reject') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('rejects.update', $reject->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Weight',
                    'name' => 'weight',
                    'type' => 'number',
                    'value' => $reject->weight,
                    'modifier' => '',
                ])
            
                <input type="hidden" name="weight_origin" value="{{ $reject->weight }}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save 
                    @include('components.icon', ['icon' => 'edit'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach