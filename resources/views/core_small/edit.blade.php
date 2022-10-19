@foreach($core_smalls as $core_small)
<div class="modal fade" id="edit{{ $core_small->id }}" tabindex="-1" core_small="dialog" aria-labelledby="edit{{ $core_small->id }}Label" aria-hidden="true">
    <div class="modal-dialog" core_small="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $core_small->id }}Label">Edit {{ ucfirst('Core Sample EK') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('core_smalls.update', $core_small->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'barcode',
                    'type' => 'text',
                    'value' => $core_small->barcode,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Batch',
                    'name' => 'batch',
                    'type' => 'text',
                    'value' => $core_small->batch,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Brix',
                    'name' => 'percent_brix',
                    'type' => 'number',
                    'value' => $core_small->percent_brix,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Pol',
                    'name' => 'percent_pol',
                    'type' => 'number',
                    'value' => $core_small->percent_pol,
                    'modifier' => '',
                ])
            
                <input type="hidden" name="percent_brix_origin" value="{{ $core_small->percent_brix }}">
                <input type="hidden" name="percent_pol_origin" value="{{ $core_small->percent_pol }}">
                <input type="hidden" name="yield_origin" value="{{ $core_small->yield }}">

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