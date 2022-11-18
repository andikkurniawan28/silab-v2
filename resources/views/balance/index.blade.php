@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data {{ ucfirst('Flow Nira Mentah') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tebu<sub>(Ku)</sub></th>
                            <th>Totalizer</th>
                            <th>Flow</th>
                            <th>NM%Tebu</th>
                            <th>Admin</th>
                            <th>Created @</th>

                            @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                                <th>Updated @</th>
                                <th>Action</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balances as $balance)
                        <tr>
                            <td>{{ $balance->id }}</td>
                            <td>{{ $balance->sugar_cane }}</td>
                            <td>{{ $balance->totalizer_raw_juice }}</td>
                            <td>{{ $balance->flow_raw_juice }}</td>
                            <td>{{ $balance->raw_juice_percent_sugar_cane }}</td>
                            <td>{{ $balance->admin }}</td>
                            <td>{{ $balance->created_at }}</td>

                            @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                                <td>{{ $balance->updated_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $balance->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $balance->id }}">
                                        @include('components.icon', ['icon' => 'trash '])
                                        Hapus
                                    </button>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                    @include('components.icon', ['icon' => 'plus '])
                    Tambah
                </button>
            @endif
        </div>
    </div>
</div>
@endsection

@section('modal')
@include('balance.create')
@include('balance.edit')
@include('balance.delete')
@endsection
