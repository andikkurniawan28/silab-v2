@foreach($sugars as $sugar)
<div class="modal fade" id="edit{{ $sugar->id }}" tabindex="-1" sugar="dialog" aria-labelledby="edit{{ $sugar->id }}Label" aria-hidden="true">
    <div class="modal-dialog" sugar="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $sugar->id }}Label">Edit {{ ucfirst('Analisa Gula') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('sugars.update', $sugar->id) }}" class="text-dark">
                @csrf
                @method('PUT')
                
                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $sugar->material_name,
                    'modifier' => 'readonly',
                ])
                
                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $sugar->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Sulphur',
                    'name' => 'sulphur',
                    'type' => 'number',
                    'value' => $sugar->sulphur,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Diameter',
                    'name' => 'diameter',
                    'type' => 'number',
                    'value' => $sugar->diameter,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Blackspot',
                    'name' => 'blackspot',
                    'type' => 'number',
                    'value' => $sugar->blackspot,
                    'modifier' => '',
                ])
            
                <input type="hidden" name="sulphur_origin" value="{{ $sugar->sulphur }}">
                <input type="hidden" name="diameter_origin" value="{{ $sugar->diameter }}">
                <input type="hidden" name="blackspot_origin" value="{{ $sugar->blackspot }}">

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