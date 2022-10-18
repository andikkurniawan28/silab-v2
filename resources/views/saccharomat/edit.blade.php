@foreach($saccharomats as $saccharomat)
<div class="modal fade" id="edit{{ $saccharomat->id }}" tabindex="-1" saccharomat="dialog" aria-labelledby="edit{{ $saccharomat->id }}Label" aria-hidden="true">
    <div class="modal-dialog" saccharomat="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $saccharomat->id }}Label">Edit {{ ucfirst('saccharomat') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('saccharomats.update', $saccharomat->id) }}" class="text-dark">
                @csrf
                @method('PUT')
                
                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $saccharomat->material_name,
                    'modifier' => 'readonly',
                ])
                
                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $saccharomat->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => '% Brix',
                    'name' => 'percent_brix',
                    'type' => 'number',
                    'value' => $saccharomat->percent_brix,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => '% Pol',
                    'name' => 'percent_pol',
                    'type' => 'number',
                    'value' => $saccharomat->percent_pol,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Pol',
                    'name' => 'pol',
                    'type' => 'number',
                    'value' => $saccharomat->pol,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Purity',
                    'name' => 'purity',
                    'type' => 'number',
                    'value' => $saccharomat->purity,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Yield',
                    'name' => 'yield',
                    'type' => 'number',
                    'value' => $saccharomat->yield,
                    'modifier' => 'readonly',
                ])
            
                <input type="hidden" name="percent_brix_origin" value="{{ $saccharomat->percent_brix }}">
                <input type="hidden" name="percent_pol_origin" value="{{ $saccharomat->percent_pol }}">
                <input type="hidden" name="pol_origin" value="{{ $saccharomat->pol }}">
                <input type="hidden" name="purity_origin" value="{{ $saccharomat->purity }}">
                <input type="hidden" name="yield_origin" value="{{ $saccharomat->yield }}">

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