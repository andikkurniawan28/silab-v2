<div class="col-lg-8 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left"><a href="#" class="text-light">Rekapitulasi Per Shift & Harian</a></h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Yesterday</td>
                        <td>Weight<sub>(Kg)</sub></td>
                        <td>Charge</td>
                        <th>Today</td>
                        <td>Weight<sub>(Kg)</sub></td>
                        <td>Charge</td>
                    </tr>
                    <tr>
                        <th>Pagi</th>
                        <td>{{ number_format($data['bobot']['shift'][1]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][1]) }}</td>
                        <th>Pagi</th>
                        <td>{{ number_format($data['bobot']['shift'][4]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][4]) }}</td>
                    </tr>
                    <tr>
                        <th>Siang</th>
                        <td>{{ number_format($data['bobot']['shift'][2]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][2]) }}</td>
                        <th>Siang</th>
                        <td>{{ number_format($data['bobot']['shift'][5]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][5]) }}</td>
                    </tr>
                    <tr>
                        <th>Malam</th>
                        <td>{{ number_format($data['bobot']['shift'][3]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][3]) }}</td>
                        <th>Malam</th>
                        <td>{{ number_format($data['bobot']['shift'][6]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][6]) }}</td>
                    </tr>
                    <tr>
                        <th>Harian</th>
                        <td>{{ number_format($data['bobot']['shift'][7]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][7]) }}</td>
                        <th>Harian</th>
                        <td>{{ number_format($data['bobot']['shift'][8]) }}</td>
                        <td>{{ number_format($data['charge']['shift'][8]) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left"><a href="#" class="text-light">Rekapitulasi Sampai Dengan</a></h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Time</td>
                        <td>Weight<sub>(Kg)</sub></td>
                    </tr>
                    <tr>
                        <th>Kemarin</th>
                        <td>{{ number_format($data['bobot']['shift'][7]) }}</td>
                    </tr>
                    <tr>
                        <th>SD Kemarin</th>
                        <td>{{ number_format($data['bobot_sd_kemarin']) }}</td>
                    </tr>
                    <tr>
                        <th>SD Hari Ini</th>
                        <td>{{ number_format($data['bobot_sd_hari_ini']) }}</td>
                    </tr>
                    <tr>
                        <th>SD Saat Ini</th>
                        <td>{{ number_format($data['bobot_sd_saat_ini']) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left"><a href="#" class="text-light">Rekapitulasi Per Jam</a></h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Hour</td>
                        <td>Weight<sub>(Kg)</sub></td>
                    </tr>
                    @for($i = 0; $i < count($data['bobot_jam']); $i++)
                    <tr>
                        <td>{{ $i }}:00</td>
                        <td>{{ number_format($data['bobot_jam'][$i]) }}</td>
                    </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-8 mb-4">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">{{ strtoupper('timbangan per Charge') }}</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Time</th>
                        <th>Bruto</th>
                        <th>Tarra</th>
                        <th>Netto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['latest'] as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->time }}</td>
                        <td>{{ $data->bruto }}</td>
                        <td>{{ $data->tarra }}</td>
                        <td>{{ $data->netto }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createRawSugarIn">
            @include('components.icon', ['icon' => 'edit'])
            Adjust
        </button>
        @include('timbangan_in_proses.createRawSugarIn')
    </div>
</div>
</div>
