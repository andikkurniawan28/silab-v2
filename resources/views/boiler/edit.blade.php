@foreach($boilers as $boiler)
<div class="modal fade" id="edit{{ $boiler->id }}" tabindex="-1" boiler="dialog" aria-labelledby="edit{{ $boiler->id }}Label" aria-hidden="true">
    <div class="modal-dialog" boiler="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $boiler->id }}Label">Edit {{ ucfirst('Analisa Ketel') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('boilers.update', $boiler->id) }}" class="text-dark">
                @csrf
                @method('PUT')
                
                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $boiler->material_name,
                    'modifier' => 'readonly',
                ])
                
                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $boiler->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'TDS',
                    'name' => 'tds',
                    'type' => 'number',
                    'value' => $boiler->tds,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'pH',
                    'name' => 'ph',
                    'type' => 'number',
                    'value' => $boiler->ph,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Hardness',
                    'name' => 'hardness',
                    'type' => 'number',
                    'value' => $boiler->hardness,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Phospate',
                    'name' => 'phospate',
                    'type' => 'number',
                    'value' => $boiler->phospate,
                    'modifier' => '',
                ])
            
                <input type="hidden" name="tds_origin" value="{{ $boiler->tds }}">
                <input type="hidden" name="ph_origin" value="{{ $boiler->ph }}">
                <input type="hidden" name="hardness_origin" value="{{ $boiler->hardness }}">
                <input type="hidden" name="phospate_origin" value="{{ $boiler->phospate }}">

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