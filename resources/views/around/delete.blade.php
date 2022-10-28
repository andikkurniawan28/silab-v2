@foreach($arounds as $around)
<div class="modal fade" id="delete{{ $around->id }}" tabindex="-1" around="dialog" aria-labelledby="delete{{ $around->id }}Label" aria-hidden="true">
    <div class="modal-dialog" around="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $around->id }}Label">Delete {{ ucfirst('Data Proses') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('arounds.destroy', $around->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>

                @include('components.input',[
                    'label' => 'ID',
                    'name' => 'id',
                    'type' => 'number',
                    'value' => $around->id,
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