@foreach($core_smalls as $core_small)
<div class="modal fade" id="delete{{ $core_small->id }}" tabindex="-1" core_small="dialog" aria-labelledby="delete{{ $core_small->id }}Label" aria-hidden="true">
    <div class="modal-dialog" core_small="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $core_small->id }}Label">Delete {{ ucfirst('Core Sample EK') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('core_smalls.destroy', $core_small->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>
                
                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $core_small->barcode,
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