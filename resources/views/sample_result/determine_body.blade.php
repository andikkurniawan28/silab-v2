@switch($method)
    @case(1)
        <td>
            @if($data->coloromat_verification == 1)
                {{ $data->icumsa }}
            @endif
        </td>
        <td>
            @if($data->moisture_verification == 1)
                {{ $data->moisture }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                @if($data->station_id == 1 || $data->station_id == 8)
                    {{ 100 - $data->moisture }}
                @endif
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                @if($data->station_id == 1 || $data->station_id == 8)
                    {{ number_format(($data->purity / 100) * (100 - $data->moisture),2) }}
                @endif
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->purity }}
            @endif
        </td>
        <td>
            @if($data->sugar_verification == 1)
                {{ $data->sulphur }}
            @endif
        </td>
        <td>
            @if($data->sugar_verification == 1)
                {{ $data->diameter }}
            @endif
        </td>
        @break
    @case(2)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->purity }}
            @endif
        </td>
        @break
    @case(3)
        <td>
            @if($data->baggase_verification == 1)
                {{ $data->corrected_pol }}
            @endif
        </td>
        <td>
            @if($data->baggase_verification == 1)
                {{ $data->dry }}
            @endif
        </td>
        <td>
            @if($data->baggase_verification == 1)
                {{ $data->water }}
            @endif
        </td>
        @break
    @case(4)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->purity }}
            @endif
        </td>
        <td>
            @if($data->coloromat_verification == 1)
                {{ $data->icumsa }}
            @endif
        </td>
        <td>
            @if($data->umum_verification == 1)
                {{ $data->cao }}
            @endif
        </td>
        <td>
            @if($data->umum_verification == 1)
                {{ $data->ph }}
            @endif
        </td>
        <td>
            @if($data->umum_verification == 1)
                {{ $data->turbidity }}
            @endif
        </td>
        @break
    @case(5)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->purity }}
            @endif
        </td>
        <td>
            @if($data->coloromat_verification == 1)
                {{ $data->icumsa }}
            @endif
        </td>
        @break
    @case(6)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        <td>
            @if($data->special_verification == 1)
                {{ $data->tsai }}
            @endif
        </td>
        <td>
            @if($data->special_verification == 1)
                {{ $data->opticaL_density }}
            @endif
        </td>
        @break
    @case(7)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->pol }}
            @endif
        </td>
        <td>
            @if($data->moisture_verification == 1)
                {{ $data->moisture }}
            @endif
        </td>
        @break
    @case(8)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->pol }}
            @endif
        </td>
        <td>
            @if($data->baggase_verification == 1)
                {{ $data->water }}
            @endif
        </td>
        @break
    @case(9)
        <td>
            @if($data->boiler_verification == 1)
                {{ $data->tds }}
            @endif
        </td>
        <td>
            @if($data->boiler_verification == 1)
                {{ $data->ph }}
            @endif
        </td>
        <td>
            @if($data->boiler_verification == 1)
                {{ $data->hardness }}
            @endif
        </td>
        <td>
            @if($data->boiler_verification == 1)
                {{ $data->phospate }}
            @endif
        </td>
        @break
    @case(10)
        <td>
            @if($data->coloromat_verification == 1)
                {{ $data->icumsa }}
            @endif
        </td>
        <td>
            @if($data->moisture_verification == 1)
                {{ $data->moisture }}
            @endif
        </td>
        @break
    @case(11)
        <td>
            @if($data->special_verification == 1)
                {{ $data->calcium }}
            @endif
        </td>
        @break
    @case(12)
        <td>
            @if($data->special_verification == 1)
                {{ $data->preparation_index }}
            @endif
        </td>
        <td>
            @if($data->special_verification == 1)
                {{ $data->fiber }}
            @endif
        </td>
        @break
    @case(13)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->purity }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->yield }}
            @endif
        </td>
        @break
    @case(14)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        <td>
            @if($data->umum_verification == 1)
                {{ $data->ph }}
            @endif
        </td>
        <td>
            @if($data->umum_verification == 1)
                {{ $data->temperature }}
            @endif
        </td>
        @break
    @case(15)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_pol }}
            @endif
        </td>
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->purity }}
            @endif
        </td>
        <td>
            @if($data->coloromat_verification == 1)
                {{ $data->icumsa }}
            @endif
        </td>
        <td>{{ $data->pan }}</td>
        <td>{{ $data->reef }}</td>
        <td>{{ $data->volume }}</td>
        @break
    @case(16)
        <td>
            @if($data->saccharomat_verification == 1)
                {{ $data->percent_brix }}
            @endif
        </td>
        @break
    @case(17)
        <td>
            @if($data->boiler_verification == 1)
                {{ $data->tds }}
                {{ $data->ph }}
            @endif
        </td>
        @break
    @default
        <p>Method Undefined</p>
        @break
@endswitch