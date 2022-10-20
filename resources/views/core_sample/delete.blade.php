@foreach($core_samples as $core_sample)
<div class="modal fade" id="delete{{ $core_sample->id }}" tabindex="-1" core_sample="dialog" aria-labelledby="delete{{ $core_sample->id }}Label" aria-hidden="true">
    <div class="modal-dialog" core_sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $core_sample->id }}Label">Delete {{ ucfirst('Core Sample') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('core_samples.destroy', $core_sample->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>
                
                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $core_sample->barcode,
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