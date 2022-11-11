@foreach($core_samples as $core_sample)
<div class="modal fade" id="show{{ $core_sample->id }}" tabindex="-1" core_sample="dialog" aria-labelledby="show{{ $core_sample->id }}Label" aria-hidden="true">
    <div class="modal-dialog" core_sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $core_sample->id }}Label">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="#" class="text-dark">

                @include('components.input',[
                    'label' => 'Antrian',
                    'name' => 'barcode',
                    'type' => 'text',
                    'value' => $core_sample->barcode,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'No Bor',
                    'name' => 'spot',
                    'type' => 'text',
                    'value' => $core_sample->spot,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Batch',
                    'name' => 'batch',
                    'type' => 'text',
                    'value' => $core_sample->batch,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Register',
                    'name' => 'register',
                    'type' => 'text',
                    'value' => $core_sample->register,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Armada',
                    'name' => 'vehicle',
                    'type' => 'text',
                    'value' => $core_sample->vehicle,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'KUD',
                    'name' => 'cooperative',
                    'type' => 'text',
                    'value' => $core_sample->cooperative,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Pos',
                    'name' => 'outpost',
                    'type' => 'text',
                    'value' => $core_sample->outpost,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Asal',
                    'name' => 'program',
                    'type' => 'text',
                    'value' => $core_sample->program,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Nopol',
                    'name' => 'truck_number',
                    'type' => 'text',
                    'value' => $core_sample->truck_number,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Petani',
                    'name' => 'farmer',
                    'type' => 'text',
                    'value' => $core_sample->farmer,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Pucuk',
                    'name' => 'pucuk',
                    'type' => 'text',
                    'value' => $core_sample->pucuk,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Lonjoran',
                    'name' => 'lonjoran',
                    'type' => 'text',
                    'value' => $core_sample->lonjoran,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Time',
                    'name' => 'farmer',
                    'type' => 'text',
                    'value' => $core_sample->created_at,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach