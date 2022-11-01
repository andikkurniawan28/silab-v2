<div class="col-lg-6 mb-4">
    <div class="card bg-{{ $color }} text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left">{{ $label }}</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Time</th>
                        <th>Value</th>
                        {{-- <th>Admin</th> --}}
                    </tr>
                    @for($i=0; $i<count($balances); $i++)
                    <tr>
                        <td>{{ date('H:i', strtotime($balances[$i]->created_at)) }}</td>
                        <td>{{ $balances[$i]->{$var} }}
                        {{-- <td>{{ $balances[$i]->admin }} --}}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>