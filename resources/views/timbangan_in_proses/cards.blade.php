<div class="col-lg-4 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left">Timbangan Tetes</h5>
            </div>
            <br>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <td>Today<sub>(Kg)</sub></td>
                        <td>{{ number_format($data['tetes']['today']) }}</td>
                    </tr>
                    <tr>
                        <td>Recap<sub>(Kg)</sub></td>
                        <td>{{ number_format($data['tetes']['until_today']) }}</td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left">Timbangan RS In</h5>
            </div>
            <br>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <td>Today<sub>(Kg)</sub></td>
                        <td>{{ number_format($data['raw_sugar']['today']) }}</td>
                    </tr>
                    <tr>
                        <td>Recap<sub>(Kg)</sub></td>
                        <td>{{ number_format($data['raw_sugar']['until_today']) }}</td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left">Timbangan RS Out</h5>
            </div>
            <br>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <td>Today<sub>(Kg)</sub></td>
                        <td>{{ number_format($data['raw_sugar_output']['today']) }}</td>
                    </tr>
                    <tr>
                        <td>Recap<sub>(Kg)</sub></td>
                        <td>{{ number_format($data['raw_sugar_output']['until_today']) }}</td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left"><a href="{{ route('timbangan_tetes') }}" class="text-light">Timbangan Tetes</a></h5>
            </div>
            <br>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Hour</td>
                        <td>Weight<sub>(Kg)</sub></td>
                        <td>Density<!--<sub>(Kg)</sub>--></td>
                    </tr>
                    @for($i = 0; $i < count($data['tetes']['hour']); $i++)
                    <tr>
                        <td>{{ $i }}:00</td>
                        <td>{{ number_format($data['tetes']['hour'][$i]) }}</td>
                        <td>{{ number_format($data['bj_tetes']['hour'][$i], 2) }}</td>
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
            @if(Auth()->user()->role_id == 1)
                <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#createTetes">
                    Adjust
                    @include('components.icon', ['icon' => 'edit '])
                </button>
                @include('timbangan_in_proses.createTetes')
            @endif
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card bg-info text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left"><a href="{{ route('timbangan_rs_in') }}" class="text-light">Timbangan RS In</a></h5>
            </div>
            <br>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Hour</td>
                        <td>Weight<sub>(Kg)</sub></td>
                    </tr>
                    @for($i = 0; $i < count($data['raw_sugar']['hour']); $i++)
                    <tr>
                        <td>{{ $i }}:00</td>
                        <td>{{ number_format($data['raw_sugar']['hour'][$i]) }}</td>
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
            @if(Auth()->user()->role_id == 1)
                <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#createRawSugarIn">
                    Adjust
                    @include('components.icon', ['icon' => 'edit '])
                </button>
                @include('timbangan_in_proses.createRawSugarIn')
            @endif
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card bg-dark text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left"><a href="{{ route('timbangan_rs_out') }}" class="text-light">Timbangan RS Out</a></h5>
            </div>
            <br>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Hour</td>
                        <td>Weight<sub>(Kg)</sub></td>
                    </tr>
                    @for($i = 0; $i < count($data['raw_sugar_output']['hour']); $i++)
                    <tr>
                        <td>{{ $i }}:00</td>
                        <td>{{ number_format($data['raw_sugar_output']['hour'][$i]) }}</td>
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
            @if(Auth()->user()->role_id == 1)
                <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#createRawSugarOut">
                    Adjust
                    @include('components.icon', ['icon' => 'edit '])
                </button>
                @include('timbangan_in_proses.createRawSugarOut')
            @endif
        </div>
    </div>
</div>

<div class="col-lg-6 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left"><a href="#" class="text-light">Timbangan Tetes</a></h5>
            </div>
            <br>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Yesterday</td>
                        <td>Weight<sub>(Kg)</sub></td>
                        <td>Density</td>
                        <th>Today</td>
                        <td>Weight<sub>(Kg)</sub></td>
                        <td>Density</td>
                    </tr>
                    <tr>
                        <th>Pagi</th>
                        <td>{{ number_format($data['tetes']['yesterday']['shift'][1]) }}</td>
                        <td></td>
                        <th>Pagi</th>
                        <td>{{ number_format($data['tetes']['now']['shift'][1]) }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Sore</th>
                        <td>{{ number_format($data['tetes']['yesterday']['shift'][2]) }}</td>
                        <td></td>
                        <th>Sore</th>
                        <td>{{ number_format($data['tetes']['now']['shift'][2]) }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Malam</th>
                        <td>{{ number_format($data['tetes']['yesterday']['shift'][3]) }}</td>
                        <td></td>
                        <th>Malam</th>
                        <td>{{ number_format($data['tetes']['now']['shift'][3]) }}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
    </div>
</div>
