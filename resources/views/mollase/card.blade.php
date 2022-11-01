<div class="col-lg-6 mb-4">
    <div class="card bg-{{ $color }} text-white shadow">
        <div class="card-body">
            <div class="font-weight-bold text-light text-uppercase mb-1">
                <h5 align="left">{{ $label }}</h5>
            </div>
            <div class="table-responsive">
                <table width="100%" class="table table-sm table-hovered text-light text-left">
                    <tr>
                        <th>Date</th>
                        <th>Value</th>
                        {{-- <th>Admin</th> --}}
                    </tr>
                    @for($i=0; $i<count($mollases); $i++)
                    <tr>
                        <td>{{ date('d-m', strtotime($mollases[$i]->created_at)) }}</td>
                        <td>{{ $mollases[$i]->{$var} }}
                        {{-- <td>{{ $mollases[$i]->admin }} --}}
                    </tr>
                    @endfor
                </table>
            </div>
            <br>
        </div>
    </div>
</div>