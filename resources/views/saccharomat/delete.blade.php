@foreach($saccharomats as $saccharomat)
<div class="modal fade" id="delete{{ $saccharomat->id }}" tabindex="-1" saccharomat="dialog" aria-labelledby="delete{{ $saccharomat->id }}Label" aria-hidden="true">
    <div class="modal-dialog" saccharomat="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $saccharomat->id }}Label">Delete {{ ucfirst('saccharomat') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('saccharomats.destroy', $saccharomat->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Are you sure ?</p>

                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $saccharomat->sample->material->name,
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
