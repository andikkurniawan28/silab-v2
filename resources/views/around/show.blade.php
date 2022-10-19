@foreach($arounds as $around)
<div class="modal fade" id="show{{ $around->id }}" tabindex="-1" around="dialog" aria-labelledby="show{{ $around->id }}Label" aria-hidden="true">
    <div class="modal-dialog" around="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $around->id }}Label">Show {{ ucfirst('keliling') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('arounds.update', $around->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input3',[
                    'label' => 'Tekanan PE1',
                    'name' => 'tek_pe1',
                    'type' => 'number',
                    'value' => $around->tek_pe1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan PE2',
                    'name' => 'tek_pe2',
                    'type' => 'number',
                    'value' => $around->tek_pe2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Evap1',
                    'name' => 'tek_evap1',
                    'type' => 'number',
                    'value' => $around->tek_evap1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Evap2',
                    'name' => 'tek_evap2',
                    'type' => 'number',
                    'value' => $around->tek_evap2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Evap3',
                    'name' => 'tek_evap3',
                    'type' => 'number',
                    'value' => $around->tek_evap3,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Evap4',
                    'name' => 'tek_evap4',
                    'type' => 'number',
                    'value' => $around->tek_evap4,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Evap5',
                    'name' => 'tek_evap5',
                    'type' => 'number',
                    'value' => $around->tek_evap5,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Evap6',
                    'name' => 'tek_evap6',
                    'type' => 'number',
                    'value' => $around->tek_evap6,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Evap7',
                    'name' => 'tek_evap7',
                    'type' => 'number',
                    'value' => $around->tek_evap7,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan1',
                    'name' => 'tek_pan1',
                    'type' => 'number',
                    'value' => $around->tek_pan1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan2',
                    'name' => 'tek_pan2',
                    'type' => 'number',
                    'value' => $around->tek_pan2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan3',
                    'name' => 'tek_pan3',
                    'type' => 'number',
                    'value' => $around->tek_pan3,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan4',
                    'name' => 'tek_pan4',
                    'type' => 'number',
                    'value' => $around->tek_pan4,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan5',
                    'name' => 'tek_pan5',
                    'type' => 'number',
                    'value' => $around->tek_pan5,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan6',
                    'name' => 'tek_pan6',
                    'type' => 'number',
                    'value' => $around->tek_pan6,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan7',
                    'name' => 'tek_pan7',
                    'type' => 'number',
                    'value' => $around->tek_pan7,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan8',
                    'name' => 'tek_pan8',
                    'type' => 'number',
                    'value' => $around->tek_pan8,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan9',
                    'name' => 'tek_pan9',
                    'type' => 'number',
                    'value' => $around->tek_pan9,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan10',
                    'name' => 'tek_pan10',
                    'type' => 'number',
                    'value' => $around->tek_pan10,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan11',
                    'name' => 'tek_pan11',
                    'type' => 'number',
                    'value' => $around->tek_pan11,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan12',
                    'name' => 'tek_pan12',
                    'type' => 'number',
                    'value' => $around->tek_pan12,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan13',
                    'name' => 'tek_pan13',
                    'type' => 'number',
                    'value' => $around->tek_pan13,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Pan14',
                    'name' => 'tek_pan14',
                    'type' => 'number',
                    'value' => $around->tek_pan14,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Tekanan Vakum',
                    'name' => 'tek_vakum',
                    'type' => 'number',
                    'value' => $around->tek_vakum,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu PE1',
                    'name' => 'suhu_pe1',
                    'type' => 'number',
                    'value' => $around->suhu_pe1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu PE2',
                    'name' => 'suhu_pe2',
                    'type' => 'number',
                    'value' => $around->suhu_pe2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu PE2',
                    'name' => 'suhu_pe2',
                    'type' => 'number',
                    'value' => $around->suhu_pe2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Evap1',
                    'name' => 'suhu_evap1',
                    'type' => 'number',
                    'value' => $around->suhu_evap1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Evap2',
                    'name' => 'suhu_evap2',
                    'type' => 'number',
                    'value' => $around->suhu_evap2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Evap3',
                    'name' => 'suhu_evap3',
                    'type' => 'number',
                    'value' => $around->suhu_evap3,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Evap4',
                    'name' => 'suhu_evap4',
                    'type' => 'number',
                    'value' => $around->suhu_evap4,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Evap5',
                    'name' => 'suhu_evap5',
                    'type' => 'number',
                    'value' => $around->suhu_evap5,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Evap6',
                    'name' => 'suhu_evap6',
                    'type' => 'number',
                    'value' => $around->suhu_evap6,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Evap7',
                    'name' => 'suhu_evap7',
                    'type' => 'number',
                    'value' => $around->suhu_evap7,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Heater1',
                    'name' => 'suhu_heater1',
                    'type' => 'number',
                    'value' => $around->suhu_heater1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Heater2',
                    'name' => 'suhu_heater2',
                    'type' => 'number',
                    'value' => $around->suhu_heater2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Heater3',
                    'name' => 'suhu_heater3',
                    'type' => 'number',
                    'value' => $around->suhu_heater3,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Air Injeksi',
                    'name' => 'suhu_air_injeksi',
                    'type' => 'number',
                    'value' => $around->suhu_air_injeksi,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Suhu Air Terjun',
                    'name' => 'suhu_air_terjun',
                    'type' => 'number',
                    'value' => $around->suhu_air_terjun,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Uap Baru',
                    'name' => 'uap_baru',
                    'type' => 'number',
                    'value' => $around->uap_baru,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Uap Bekas',
                    'name' => 'uap_bekas',
                    'type' => 'number',
                    'value' => $around->uap_bekas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Uap 3Ato',
                    'name' => 'uap_3ato',
                    'type' => 'number',
                    'value' => $around->uap_3ato,
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