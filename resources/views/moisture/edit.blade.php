@foreach($moistures as $moisture)
<div class="modal fade" id="edit{{ $moisture->id }}" tabindex="-1" moisture="dialog" aria-labelledby="edit{{ $moisture->id }}Label" aria-hidden="true">
    <div class="modal-dialog" moisture="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $moisture->id }}Label">Edit {{ ucfirst('moisture') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('moistures.update', $moisture->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $moisture->sample->material->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $moisture->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Moisture',
                    'name' => 'moisture',
                    'type' => 'number',
                    'value' => $moisture->moisture,
                    'modifier' => '',
                ])

                <input type="hidden" name="moisture_origin" value="{{ $moisture->moisture }}">

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
