@foreach($specials as $special)
<div class="modal fade" id="delete{{ $special->id }}" tabindex="-1" special="dialog" aria-labelledby="delete{{ $special->id }}Label" aria-hidden="true">
    <div class="modal-dialog" special="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $special->id }}Label">Delete {{ ucfirst('Analisa Khusus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('specials.destroy', $special->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>
                
                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $special->material_name,
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