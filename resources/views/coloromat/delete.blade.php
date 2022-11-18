@foreach($coloromats as $coloromat)
<div class="modal fade" id="delete{{ $coloromat->id }}" tabindex="-1" coloromat="dialog" aria-labelledby="delete{{ $coloromat->id }}Label" aria-hidden="true">
    <div class="modal-dialog" coloromat="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $coloromat->id }}Label">Hapus {{ ucfirst('coloromat') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('coloromats.destroy', $coloromat->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apa anda yakin ?</p>

                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $coloromat->sample->material->name,
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
