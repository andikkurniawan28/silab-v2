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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Core Sample EB') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barcode</th>
                            <th>Batch</th>
                            <th>Register</th>
                            <th>KUD</th>
                            <th>Pos</th>
                            <th>Program</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Yield</th>
                            <th>Admin</th>
                            <th>Master</th>
                            <th>Created @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_bigs as $core_big)
                        <tr>
                            <td>{{ $core_big->id }}</td>
                            <td>{{ $core_big->barcode }}</td>
                            <td>{{ $core_big->batch }}</td>
                            <td>{{ $core_big->register }}</td>
                            <td>{{ $core_big->cooperative }}</td>
                            <td>{{ $core_big->outpost }}</td>
                            <td>{{ $core_big->program }}</td>
                            <td>{{ $core_big->percent_brix }}</td>
                            <td>{{ $core_big->percent_pol }}</td>
                            <td>{{ $core_big->yield }}</td>
                            <td>{{ $core_big->admin }}</td>
                            <td>{{ $core_big->master }}</td>
                            <td>{{ $core_big->created_at }}</td>
                            <td>
                                @if($core_big->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $core_big->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $core_big->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
                                    </button>
                                @elseif($core_big->is_verified == 1 && session('role') != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock ']) 
                                            Locked
                                        </span>
                                    </h4>
                                @elseif($core_big->is_verified == 1 && session('role') == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $core_big->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $core_big->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus ']) 
                Create
            </button>
            <a href="core_bigs_correction" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'history ']) 
                Correction
            </a>

            @if(session('role') == 1 or session('role') == 2)
            <a href="core_bigs_verification" type="button" class="btn btn-secondary">
                @include('components.icon', ['icon' => 'check ']) 
                Verification
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('core_big.create')
@include('core_big.edit')
@include('core_big.delete')
@endsection
