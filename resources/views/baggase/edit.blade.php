@foreach($baggases as $baggase)
<div class="modal fade" id="edit{{ $baggase->id }}" tabindex="-1" baggase="dialog" aria-labelledby="edit{{ $baggase->id }}Label" aria-hidden="true">
    <div class="modal-dialog" baggase="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $baggase->id }}Label">Edit {{ ucfirst('Analisa Ampas') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('baggases.update', $baggase->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Material',
                    'name' => 'material_name',
                    'type' => 'text',
                    'value' => $baggase->sample->material->name,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Sample',
                    'name' => 'sample_id',
                    'type' => 'number',
                    'value' => $baggase->sample_id,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Pol',
                    'name' => 'corrected_pol',
                    'type' => 'number',
                    'value' => $baggase->corrected_pol,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'ZK',
                    'name' => 'dry',
                    'type' => 'number',
                    'value' => $baggase->dry,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Air',
                    'name' => 'water',
                    'type' => 'number',
                    'value' => $baggase->water,
                    'modifier' => '',
                ])

                <input type="hidden" name="corrected_pol_origin" value="{{ $baggase->corrected_pol }}">
                <input type="hidden" name="dry_origin" value="{{ $baggase->dry }}">
                <input type="hidden" name="water_origin" value="{{ $baggase->water }}">

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
