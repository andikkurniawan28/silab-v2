@foreach($core_bigs as $core_big)
<div class="modal fade" id="delete{{ $core_big->id }}" tabindex="-1" core_big="dialog" aria-labelledby="delete{{ $core_big->id }}Label" aria-hidden="true">
    <div class="modal-dialog" core_big="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $core_big->id }}Label">Delete {{ ucfirst('Core Sample EB') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('core_bigs.destroy', $core_big->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>
                
                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $core_big->barcode,
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