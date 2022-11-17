@foreach($specials as $special)
<div class="modal fade" id="edit{{ $special->id }}" tabindex="-1" special="dialog" aria-labelledby="edit{{ $special->id }}Label" aria-hidden="true">
    <div class="modal-dialog" special="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $special->id }}Label">Edit {{ ucfirst('Analisa Khusus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('specials.update', $special->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $special->sample->material->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $special->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'TSAI',
                    'name' => 'tsai',
                    'type' => 'number',
                    'value' => $special->tsai,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Glucose',
                    'name' => 'glucose',
                    'type' => 'number',
                    'value' => $special->glucose,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Fructose',
                    'name' => 'fructose',
                    'type' => 'number',
                    'value' => $special->fructose,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Sucrose',
                    'name' => 'sucrose',
                    'type' => 'number',
                    'value' => $special->sucrose,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'PI',
                    'name' => 'preparation_index',
                    'type' => 'number',
                    'value' => $special->preparation_index,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Fiber',
                    'name' => 'fiber',
                    'type' => 'number',
                    'value' => $special->fiber,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Calcium',
                    'name' => 'calcium',
                    'type' => 'number',
                    'value' => $special->calcium,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'OD',
                    'name' => 'optical_density',
                    'type' => 'number',
                    'value' => $special->optical_density,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Reducted',
                    'name' => 'sugar_reducted',
                    'type' => 'number',
                    'value' => $special->sugar_reducted,
                    'modifier' => '',
                ])

                <input type="hidden" name="tsai_origin" value="{{ $special->tsai }}">
                <input type="hidden" name="glucose_origin" value="{{ $special->glucose }}">
                <input type="hidden" name="fructose_origin" value="{{ $special->fructose }}">
                <input type="hidden" name="sucrose_origin" value="{{ $special->sucrose }}">
                <input type="hidden" name="preparation_index_origin" value="{{ $special->preparation_index }}">
                <input type="hidden" name="fiber_origin" value="{{ $special->fiber }}">
                <input type="hidden" name="calcium_origin" value="{{ $special->calcium }}">
                <input type="hidden" name="optical_density_origin" value="{{ $special->optical_density }}">
                <input type="hidden" name="sugar_reducted_origin" value="{{ $special->sugar_reducted }}">

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
