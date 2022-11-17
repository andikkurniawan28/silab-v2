@foreach($umums as $umum)
<div class="modal fade" id="edit{{ $umum->id }}" tabindex="-1" umum="dialog" aria-labelledby="edit{{ $umum->id }}Label" aria-hidden="true">
    <div class="modal-dialog" umum="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $umum->id }}Label">Edit {{ ucfirst('Analisa Umum') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('umums.update', $umum->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $umum->sample->material->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $umum->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'CaO',
                    'name' => 'cao',
                    'type' => 'number',
                    'value' => $umum->cao,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'pH',
                    'name' => 'ph',
                    'type' => 'number',
                    'value' => $umum->ph,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Turbidity',
                    'name' => 'turbidity',
                    'type' => 'number',
                    'value' => $umum->turbidity,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Suhu',
                    'name' => 'temperature',
                    'type' => 'number',
                    'value' => $umum->temperature,
                    'modifier' => '',
                ])

                <input type="hidden" name="cao_origin" value="{{ $umum->cao }}">
                <input type="hidden" name="ph_origin" value="{{ $umum->ph }}">
                <input type="hidden" name="turbidity_origin" value="{{ $umum->turbidity }}">
                <input type="hidden" name="temperature_origin" value="{{ $umum->temperature }}">

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
