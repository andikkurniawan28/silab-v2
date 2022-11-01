@foreach($taxations as $taxation)
<div class="modal fade" id="show{{ $taxation->id }}" tabindex="-1" taxation="dialog" aria-labelledby="show{{ $taxation->id }}Label" aria-hidden="true">
    <div class="modal-dialog" taxation="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show{{ $taxation->id }}Label">Show {{ ucfirst('Taksasi In Proses') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('taxation_export') }}" class="text-dark">
                @csrf
                @method('POST')
                
                <input type="hidden" name="id" value="{{ $taxation->id }}">

                @include('components.input3',[
                    'label' => 'Peti Nira Mentah',
                    'name' => 'peti_nira_mentah',
                    'type' => 'number',
                    'value' => $taxation->peti_nira_mentah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pemanas Nira Mentah',
                    'name' => 'pemanas_nira_mentah',
                    'type' => 'number',
                    'value' => $taxation->pemanas_nira_mentah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Reaction Tank',
                    'name' => 'reaction_tank',
                    'type' => 'number',
                    'value' => $taxation->reaction_tank,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Defekator',
                    'name' => 'defekator',
                    'type' => 'number',
                    'value' => $taxation->defekator,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Clarifier ST',
                    'name' => 'clarifier_st',
                    'type' => 'number',
                    'value' => $taxation->clarifier_st,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pemanas Nira Encer',
                    'name' => 'pemanas_nira_encer',
                    'type' => 'number',
                    'value' => $taxation->pemanas_nira_encer,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap1',
                    'name' => 'evap1',
                    'type' => 'number',
                    'value' => $taxation->evap1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap2',
                    'name' => 'evap2',
                    'type' => 'number',
                    'value' => $taxation->evap2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap3',
                    'name' => 'evap3',
                    'type' => 'number',
                    'value' => $taxation->evap3,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap4',
                    'name' => 'evap4',
                    'type' => 'number',
                    'value' => $taxation->evap4,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap5',
                    'name' => 'evap5',
                    'type' => 'number',
                    'value' => $taxation->evap5,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap6',
                    'name' => 'evap6',
                    'type' => 'number',
                    'value' => $taxation->evap6,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap7',
                    'name' => 'evap7',
                    'type' => 'number',
                    'value' => $taxation->evap7,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap8',
                    'name' => 'evap8',
                    'type' => 'number',
                    'value' => $taxation->evap8,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Evap9',
                    'name' => 'evap9',
                    'type' => 'number',
                    'value' => $taxation->evap9,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'NK Sebelum Sulfitasi',
                    'name' => 'nk_sebelum_sulfitasi',
                    'type' => 'number',
                    'value' => $taxation->nk_sebelum_sulfitasi,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'NK Sulfitasi Atas',
                    'name' => 'nk_sulfitasi_atas',
                    'type' => 'number',
                    'value' => $taxation->nk_sulfitasi_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'NK Sulfitasi Bawah',
                    'name' => 'nk_sulfitasi_bawah',
                    'type' => 'number',
                    'value' => $taxation->nk_sulfitasi_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Klare SHS Atas',
                    'name' => 'klare_shs_atas',
                    'type' => 'number',
                    'value' => $taxation->klare_shs_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Klare SHS Bawah',
                    'name' => 'klare_shs_bawah',
                    'type' => 'number',
                    'value' => $taxation->klare_shs_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan1',
                    'name' => 'pan1',
                    'type' => 'number',
                    'value' => $taxation->pan1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan2',
                    'name' => 'pan2',
                    'type' => 'number',
                    'value' => $taxation->pan2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan3',
                    'name' => 'pan3',
                    'type' => 'number',
                    'value' => $taxation->pan3,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan4',
                    'name' => 'pan4',
                    'type' => 'number',
                    'value' => $taxation->pan4,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan5',
                    'name' => 'pan5',
                    'type' => 'number',
                    'value' => $taxation->pan5,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan6',
                    'name' => 'pan6',
                    'type' => 'number',
                    'value' => $taxation->pan6,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan7',
                    'name' => 'pan7',
                    'type' => 'number',
                    'value' => $taxation->pan7,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan8',
                    'name' => 'pan8',
                    'type' => 'number',
                    'value' => $taxation->pan8,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan9',
                    'name' => 'pan9',
                    'type' => 'number',
                    'value' => $taxation->pan9,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan10',
                    'name' => 'pan10',
                    'type' => 'number',
                    'value' => $taxation->pan10,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan11',
                    'name' => 'pan11',
                    'type' => 'number',
                    'value' => $taxation->pan11,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan12',
                    'name' => 'pan12',
                    'type' => 'number',
                    'value' => $taxation->pan12,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan13',
                    'name' => 'pan13',
                    'type' => 'number',
                    'value' => $taxation->pan13,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Pan14',
                    'name' => 'pan14',
                    'type' => 'number',
                    'value' => $taxation->pan14,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung1',
                    'name' => 'palung1',
                    'type' => 'number',
                    'value' => $taxation->palung1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung2',
                    'name' => 'palung2',
                    'type' => 'number',
                    'value' => $taxation->palung2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung3',
                    'name' => 'palung3',
                    'type' => 'number',
                    'value' => $taxation->palung3,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung4',
                    'name' => 'palung4',
                    'type' => 'number',
                    'value' => $taxation->palung4,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung5',
                    'name' => 'palung5',
                    'type' => 'number',
                    'value' => $taxation->palung5,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung6',
                    'name' => 'palung6',
                    'type' => 'number',
                    'value' => $taxation->palung6,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung7',
                    'name' => 'palung7',
                    'type' => 'number',
                    'value' => $taxation->palung7,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung8',
                    'name' => 'palung8',
                    'type' => 'number',
                    'value' => $taxation->palung8,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung9',
                    'name' => 'palung9',
                    'type' => 'number',
                    'value' => $taxation->palung9,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung10',
                    'name' => 'palung10',
                    'type' => 'number',
                    'value' => $taxation->palung10,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Dist Mixer A Utara',
                    'name' => 'dist_mixer_a_utara',
                    'type' => 'number',
                    'value' => $taxation->dist_mixer_a_utara,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Dist Mixer A Selatan',
                    'name' => 'dist_mixer_a_selatan',
                    'type' => 'number',
                    'value' => $taxation->dist_mixer_a_selatan,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'CVP C',
                    'name' => 'cvp_c',
                    'type' => 'number',
                    'value' => $taxation->cvp_c,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung CVP C',
                    'name' => 'palung_cvp_c',
                    'type' => 'number',
                    'value' => $taxation->palung_cvp_c,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Dist Mixer C Timur',
                    'name' => 'dist_mixer_c_timur',
                    'type' => 'number',
                    'value' => $taxation->dist_mixer_c_timur,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Dist Mixer C Barat',
                    'name' => 'dist_mixer_c_barat',
                    'type' => 'number',
                    'value' => $taxation->dist_mixer_c_barat,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'CVP D',
                    'name' => 'cvp_d',
                    'type' => 'number',
                    'value' => $taxation->cvp_d,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Palung CVP D',
                    'name' => 'palung_cvp_d',
                    'type' => 'number',
                    'value' => $taxation->palung_cvp_d,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Vertical Timur',
                    'name' => 'vertical_timur',
                    'type' => 'number',
                    'value' => $taxation->vertical_timur,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Vertical Barat',
                    'name' => 'vertical_barat',
                    'type' => 'number',
                    'value' => $taxation->vertical_barat,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Dist Mixer D1',
                    'name' => 'dist_mixer_d1',
                    'type' => 'number',
                    'value' => $taxation->dist_mixer_d1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Dist Mixer D2',
                    'name' => 'dist_mixer_d2',
                    'type' => 'number',
                    'value' => $taxation->dist_mixer_d2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Stroop A Atas',
                    'name' => 'stroop_a_atas',
                    'type' => 'number',
                    'value' => $taxation->stroop_a_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Stroop A Bawah',
                    'name' => 'stroop_a_bawah',
                    'type' => 'number',
                    'value' => $taxation->stroop_a_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Stroop C Atas',
                    'name' => 'stroop_c_atas',
                    'type' => 'number',
                    'value' => $taxation->stroop_c_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Stroop C Bawah',
                    'name' => 'stroop_c_bawah',
                    'type' => 'number',
                    'value' => $taxation->stroop_c_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Klare D Atas',
                    'name' => 'klare_d_atas',
                    'type' => 'number',
                    'value' => $taxation->klare_d_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Klare D Bawah',
                    'name' => 'klare_d_bawah',
                    'type' => 'number',
                    'value' => $taxation->klare_d_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Einwuurf C',
                    'name' => 'einwuurf_c',
                    'type' => 'number',
                    'value' => $taxation->einwuurf_c,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Einwuurf D',
                    'name' => 'einwuurf_d',
                    'type' => 'number',
                    'value' => $taxation->einwuurf_d,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Clear Liquor 1',
                    'name' => 'clear_liquor_1',
                    'type' => 'number',
                    'value' => $taxation->clear_liquor_1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Clear Liquor 2',
                    'name' => 'clear_liquor_2',
                    'type' => 'number',
                    'value' => $taxation->clear_liquor_2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Remelt A',
                    'name' => 'remelt_a',
                    'type' => 'number',
                    'value' => $taxation->remelt_a,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'R1 Mol Atas',
                    'name' => 'r1_mol_atas',
                    'type' => 'number',
                    'value' => $taxation->r1_mol_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'R2 Mol Atas',
                    'name' => 'r2_mol_atas',
                    'type' => 'number',
                    'value' => $taxation->r2_mol_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'R1 Mol Bawah',
                    'name' => 'r1_mol_bawah',
                    'type' => 'number',
                    'value' => $taxation->r1_mol_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'R2 Mol Bawah',
                    'name' => 'r2_mol_bawah',
                    'type' => 'number',
                    'value' => $taxation->r2_mol_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Remelter A1',
                    'name' => 'remelter_a1',
                    'type' => 'number',
                    'value' => $taxation->remelter_a1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Remelter A2',
                    'name' => 'remelter_a2',
                    'type' => 'number',
                    'value' => $taxation->remelter_a2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Remelter CD',
                    'name' => 'remelter_cd',
                    'type' => 'number',
                    'value' => $taxation->remelter_cd,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Mingler Atas',
                    'name' => 'mingler_atas',
                    'type' => 'number',
                    'value' => $taxation->mingler_atas,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Mingler Bawah',
                    'name' => 'mingler_bawah',
                    'type' => 'number',
                    'value' => $taxation->mingler_bawah,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Silo Retail',
                    'name' => 'silo_retail',
                    'type' => 'number',
                    'value' => $taxation->silo_retail,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Gula di Silo',
                    'name' => 'shs_silo',
                    'type' => 'number',
                    'value' => $taxation->shs_silo,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'PP',
                    'name' => 'pp',
                    'type' => 'number',
                    'value' => $taxation->pp,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Reaction Tank DRK',
                    'name' => 'reaction_tank_drk',
                    'type' => 'number',
                    'value' => $taxation->reaction_tank_drk,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Talo Phospatasi',
                    'name' => 'talo_phospatasi',
                    'type' => 'number',
                    'value' => $taxation->talo_phospatasi,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Deep Bad Filter',
                    'name' => 'deep_bad_filter',
                    'type' => 'number',
                    'value' => $taxation->deep_bad_filter,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'CO2 Gas Carbonator 1',
                    'name' => 'co2_gas_carbonator1',
                    'type' => 'number',
                    'value' => $taxation->co2_gas_carbonator1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'CO2 Gas Carbonator 2',
                    'name' => 'co2_gas_carbonator2',
                    'type' => 'number',
                    'value' => $taxation->co2_gas_carbonator2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'First Filtrat Tank',
                    'name' => 'first_filtrat_tank',
                    'type' => 'number',
                    'value' => $taxation->first_filtrat_tank,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Sweet Water Tank',
                    'name' => 'sweet_water_tank',
                    'type' => 'number',
                    'value' => $taxation->sweet_water_tank,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Clear Liquor Tank 1',
                    'name' => 'clear_liquor_tank1',
                    'type' => 'number',
                    'value' => $taxation->clear_liquor_tank1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Clear Liquor Tank 2',
                    'name' => 'clear_liquor_tank2',
                    'type' => 'number',
                    'value' => $taxation->clear_liquor_tank2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Carbonated Liquor Tank 1',
                    'name' => 'carbonated_liquor_tank1',
                    'type' => 'number',
                    'value' => $taxation->carbonated_liquor_tank1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Carbonated Liquor Tank 2',
                    'name' => 'carbonated_liquor_tank2',
                    'type' => 'number',
                    'value' => $taxation->carbonated_liquor_tank2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Raw Liquor Tank 1',
                    'name' => 'raw_liquor_tank1',
                    'type' => 'number',
                    'value' => $taxation->raw_liquor_tank1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Raw Liquor Tank 2',
                    'name' => 'raw_liquor_tank2',
                    'type' => 'number',
                    'value' => $taxation->raw_liquor_tank2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Clarifier Melt Tank 1',
                    'name' => 'clarifier_melt_tank1',
                    'type' => 'number',
                    'value' => $taxation->clarifier_melt_tank1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Clarifier Melt Tank 2',
                    'name' => 'clarifier_melt_tank2',
                    'type' => 'number',
                    'value' => $taxation->clarifier_melt_tank2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Filtered Nelt Tank 1',
                    'name' => 'filtered_melt_tank1',
                    'type' => 'number',
                    'value' => $taxation->filtered_melt_tank1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Filtered Melt Tank 2',
                    'name' => 'filtered_melt_tank2',
                    'type' => 'number',
                    'value' => $taxation->filtered_melt_tank2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Back Wash Tank 1',
                    'name' => 'back_wash_tank1',
                    'type' => 'number',
                    'value' => $taxation->back_wash_tank1,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Back Wash Tank 2',
                    'name' => 'back_wash_tank2',
                    'type' => 'number',
                    'value' => $taxation->back_wash_tank2,
                    'modifier' => 'readonly',
                ])

                @include('components.input3',[
                    'label' => 'Admin',
                    'name' => 'admin',
                    'type' => 'text',
                    'value' => $taxation->admin,
                    'modifier' => 'readonly',
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Export 
                    @include('components.icon', ['icon' => 'file-excel'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach