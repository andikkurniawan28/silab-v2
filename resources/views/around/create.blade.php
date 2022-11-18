<div class="modal fade" id="create" tabindex="-1" sample="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('Data Proses') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('arounds.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @for($i=1; $i<=2; $i++)
                    @include('components.input3',[
                        'label' => 'Tekanan PE'.$i,
                        'name' => 'tek_pe'.$i,
                        'type' => 'number',
                        'value' => '',
                        'modifier' => '',
                    ])
                @endfor

                @for($i=1; $i<=7; $i++)
                    @include('components.input3',[
                        'label' => 'Tekanan Evap'.$i,
                        'name' => 'tek_evap'.$i,
                        'type' => 'number',
                        'value' => '',
                        'modifier' => '',
                    ])
                @endfor

                @for($i=1; $i<=14; $i++)
                    @include('components.input3',[
                        'label' => 'Tekanan Pan'.$i,
                        'name' => 'tek_pan'.$i,
                        'type' => 'number',
                        'value' => '',
                        'modifier' => '',
                    ])
                @endfor

                @for($i=1; $i<=2; $i++)
                    @include('components.input3',[
                        'label' => 'Suhu PE'.$i,
                        'name' => 'suhu_pe'.$i,
                        'type' => 'number',
                        'value' => '',
                        'modifier' => '',
                    ])
                @endfor

                @for($i=1; $i<=7; $i++)
                    @include('components.input3',[
                        'label' => 'Suhu Evap'.$i,
                        'name' => 'suhu_evap'.$i,
                        'type' => 'number',
                        'value' => '',
                        'modifier' => '',
                    ])
                @endfor

                @for($i=1; $i<=3; $i++)
                    @include('components.input3',[
                        'label' => 'Suhu Heater'.$i,
                        'name' => 'suhu_heater'.$i,
                        'type' => 'number',
                        'value' => '',
                        'modifier' => '',
                    ])
                @endfor

                @include('components.input3',[
                    'label' => 'Tekanan Vakum',
                    'name' => 'tek_vakum',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Injeksi',
                    'name' => 'suhu_air_injeksi',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Air Terjun',
                    'name' => 'suhu_air_terjun',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Uap Baru',
                    'name' => 'uap_baru',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Uap Bekas',
                    'name' => 'uap_bekas',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

                @include('components.input3',[
                    'label' => 'Uap 3Ato',
                    'name' => 'uap_3ato',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => '',
                ])

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                <button type="submit" class="btn btn-primary">Save
                    @include('components.icon', ['icon' => 'save'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
