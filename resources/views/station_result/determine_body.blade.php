@switch($method)
    @case(1)
        <td>
            @if($analysis->coloromat_verification == 1)
                {{ $analysis->icumsa }}
            @endif
        </td>
        <td>
            @if($analysis->moisture_verification == 1)
                {{ $analysis->moisture }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                @if($analysis->station_id == 1 || $analysis->station_id == 8)
                    {{ 100 - $analysis->moisture }}
                @endif
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                @if($analysis->station_id == 1 || $analysis->station_id == 8)
                    {{ number_format(($analysis->purity / 100) * (100 - $analysis->moisture),2) }}
                @endif
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->purity }}
            @endif
        </td>
        <td>
            @if($analysis->sugar_verification == 1)
                {{ $analysis->sulphur }}
            @endif
        </td>
        <td>
            @if($analysis->sugar_verification == 1)
                {{ $analysis->diameter }}
            @endif
        </td>
        @break
    @case(2)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->purity }}
            @endif
        </td>
        @break
    @case(3)
        <td>
            @if($analysis->baggase_verification == 1)
                {{ $analysis->corrected_pol }}
            @endif
        </td>
        <td>
            @if($analysis->baggase_verification == 1)
                {{ $analysis->dry }}
            @endif
        </td>
        <td>
            @if($analysis->baggase_verification == 1)
                {{ $analysis->water }}
            @endif
        </td>
        @break
    @case(4)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->purity }}
            @endif
        </td>
        <td>
            @if($analysis->coloromat_verification == 1)
                {{ $analysis->icumsa }}
            @endif
        </td>
        <td>
            @if($analysis->umum_verification == 1)
                {{ $analysis->cao }}
            @endif
        </td>
        <td>
            @if($analysis->umum_verification == 1)
                {{ $analysis->ph }}
            @endif
        </td>
        <td>
            @if($analysis->umum_verification == 1)
                {{ $analysis->turbidity }}
            @endif
        </td>
        @break
    @case(5)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->purity }}
            @endif
        </td>
        <td>
            @if($analysis->coloromat_verification == 1)
                {{ $analysis->icumsa }}
            @endif
        </td>
        @break
    @case(6)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        <td>
            @if($analysis->special_verification == 1)
                {{ $analysis->tsai }}
            @endif
        </td>
        <td>
            @if($analysis->special_verification == 1)
                {{ $analysis->opticaL_density }}
            @endif
        </td>
        @break
    @case(7)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->pol }}
            @endif
        </td>
        <td>
            @if($analysis->moisture_verification == 1)
                {{ $analysis->moisture }}
            @endif
        </td>
        @break
    @case(8)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->pol }}
            @endif
        </td>
        <td>
            @if($analysis->baggase_verification == 1)
                {{ $analysis->water }}
            @endif
        </td>
        @break
    @case(9)
        <td>
            @if($analysis->boiler_verification == 1)
                {{ $analysis->tds }}
            @endif
        </td>
        <td>
            @if($analysis->boiler_verification == 1)
                {{ $analysis->ph }}
            @endif
        </td>
        <td>
            @if($analysis->boiler_verification == 1)
                {{ $analysis->hardness }}
            @endif
        </td>
        <td>
            @if($analysis->boiler_verification == 1)
                {{ $analysis->phospate }}
            @endif
        </td>
        @break
    @case(10)
        <td>
            @if($analysis->coloromat_verification == 1)
                {{ $analysis->icumsa }}
            @endif
        </td>
        <td>
            @if($analysis->moisture_verification == 1)
                {{ $analysis->moisture }}
            @endif
        </td>
        @break
    @case(11)
        <td>
            @if($analysis->special_verification == 1)
                {{ $analysis->calcium }}
            @endif
        </td>
        @break
    @case(12)
        <td>
            @if($analysis->special_verification == 1)
                {{ $analysis->preparation_index }}
            @endif
        </td>
        <td>
            @if($analysis->special_verification == 1)
                {{ $analysis->fiber }}
            @endif
        </td>
        @break
    @case(13)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->purity }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->yield }}
            @endif
        </td>
        @break
    @case(14)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        <td>
            @if($analysis->umum_verification == 1)
                {{ $analysis->ph }}
            @endif
        </td>
        <td>
            @if($analysis->umum_verification == 1)
                {{ $analysis->temperature }}
            @endif
        </td>
        @break
    @case(15)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_pol }}
            @endif
        </td>
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->purity }}
            @endif
        </td>
        <td>
            @if($analysis->coloromat_verification == 1)
                {{ $analysis->icumsa }}
            @endif
        </td>
        <td>{{ $analysis->pan }} </td>
        <td>{{ $analysis->reef }}</td>
        <td>{{ $analysis->volume }}</td>
        @break
    @case(16)
        <td>
            @if($analysis->saccharomat_verification == 1)
                {{ $analysis->percent_brix }}
            @endif
        </td>
        @break
    @case(17)
        <td>
            @if($analysis->boiler_verification == 1)
                {{ $analysis->tds }}
                {{ $analysis->ph }}
            @endif
        </td>
        @break
    @case(18)
        <td>
            @if($analysis->boiler_verification == 1)
                {{ $analysis->tds }}
                {{ $analysis->ph }}
                {{ $analysis->hardness }}
            @endif
        </td>
        @break
    @default
        <p>Method Undefined</p>
        @break
@endswitch
