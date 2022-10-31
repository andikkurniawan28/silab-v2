<div class="col-lg-3 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pre-Evaporator 1</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pe1 }}
                        <td>{{ $arounds[$i]->suhu_pe1 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pre-Evaporator 2</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pe2 }}
                        <td>{{ $arounds[$i]->suhu_pe2 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Evaporator 1</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_evap1 }}
                        <td>{{ $arounds[$i]->suhu_evap1 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Evaporator 2</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_evap2 }}
                        <td>{{ $arounds[$i]->suhu_evap2 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-info text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Evaporator 3</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_evap3 }}
                        <td>{{ $arounds[$i]->suhu_evap3 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-dark text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Evaporator 4</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_evap4 }}
                        <td>{{ $arounds[$i]->suhu_evap4 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Evaporator 5</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_evap5 }}
                        <td>{{ $arounds[$i]->suhu_evap5 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Evaporator 6</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_evap6 }}
                        <td>{{ $arounds[$i]->suhu_evap6 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Evaporator 7</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_evap7 }}
                        <td>{{ $arounds[$i]->suhu_evap7 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 1</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan1 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-info text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 2</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan2 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-dark text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 3</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan3 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 4</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan4 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 5</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan5 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 6</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan6 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 7</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan7 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-info text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 8</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan8 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-dark text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 9</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan9 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 10</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan10 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 11</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan11 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 12</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan12 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 13</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan13 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-info text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Pan 14</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_pan14 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-dark text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Vakum</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Pressure</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->tek_vakum }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Heater 1</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->suhu_heater1 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Heater 2</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->suhu_heater2 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Heater 3</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->suhu_heater3 }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Air Injeksi</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->suhu_air_injeksi }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-info text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Air Terjun</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Temperature</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->suhu_air_terjun }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-dark text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Uap Baru</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Uap</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->uap_baru }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Uap Bekas</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Uap</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->uap_bekas }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-4">
    <div class="card bg-secondary text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="center">Uap 3 Ato</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-center">
                    <tr>
                        <th>Time</th>
                        <th>Uap</th>
                    </tr>
                    @for($i=0; $i<count($arounds); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($arounds[$i]->created_at)) }}</td>
                        <td>{{ $arounds[$i]->uap_3ato }}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>