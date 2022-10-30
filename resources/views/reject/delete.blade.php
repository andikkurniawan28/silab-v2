@foreach($rejects as $reject)
<div class="modal fade" id="delete{{ $reject->id }}" tabindex="-1" reject="dialog" aria-labelledby="delete{{ $reject->id }}Label" aria-hidden="true">
    <div class="modal-dialog" reject="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $reject->id }}Label">Delete {{ ucfirst('reject') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('rejects.destroy', $reject->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>
                
                @include('components.input',[
                    'label' => 'ID',
                    'name' => 'id',
                    'type' => 'text',
                    'value' => $reject->id,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes 
                    @include('components.icon', ['icon' => 'trash'])
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach