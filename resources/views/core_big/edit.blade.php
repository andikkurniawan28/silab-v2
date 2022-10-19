@foreach($core_bigs as $core_big)
<div class="modal fade" id="edit{{ $core_big->id }}" tabindex="-1" core_big="dialog" aria-labelledby="edit{{ $core_big->id }}Label" aria-hidden="true">
    <div class="modal-dialog" core_big="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $core_big->id }}Label">Edit {{ ucfirst('Core Sample EB') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('core_bigs.update', $core_big->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Barcode',
                    'name' => 'barcode',
                    'type' => 'text',
                    'value' => $core_big->barcode,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Batch',
                    'name' => 'batch',
                    'type' => 'text',
                    'value' => $core_big->batch,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Brix',
                    'name' => 'percent_brix',
                    'type' => 'number',
                    'value' => $core_big->percent_brix,
                    'modifier' => '',
                ])

                @include('components.input',[
                    'label' => 'Pol',
                    'name' => 'percent_pol',
                    'type' => 'number',
                    'value' => $core_big->percent_pol,
                    'modifier' => '',
                ])
            
                <input type="hidden" name="percent_brix_origin" value="{{ $core_big->percent_brix }}">
                <input type="hidden" name="percent_pol_origin" value="{{ $core_big->percent_pol }}">
                <input type="hidden" name="yield_origin" value="{{ $core_big->yield }}">

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