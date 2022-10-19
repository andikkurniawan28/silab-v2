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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Core Sample EK') }}</h5>
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
                        @foreach ($core_smalls as $core_small)
                        <tr>
                            <td>{{ $core_small->id }}</td>
                            <td>{{ $core_small->barcode }}</td>
                            <td>{{ $core_small->batch }}</td>
                            <td>{{ $core_small->register }}</td>
                            <td>{{ $core_small->cooperative }}</td>
                            <td>{{ $core_small->outpost }}</td>
                            <td>{{ $core_small->program }}</td>
                            <td>{{ $core_small->percent_brix }}</td>
                            <td>{{ $core_small->percent_pol }}</td>
                            <td>{{ $core_small->yield }}</td>
                            <td>{{ $core_small->admin }}</td>
                            <td>{{ $core_small->master }}</td>
                            <td>{{ $core_small->created_at }}</td>
                            <td>
                                @if($core_small->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $core_small->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $core_small->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
                                    </button>
                                @elseif($core_small->is_verified == 1 && session('role') != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock ']) 
                                            Locked
                                        </span>
                                    </h4>
                                @elseif($core_small->is_verified == 1 && session('role') == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $core_small->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $core_small->id }}">
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
            <a href="core_smalls_correction" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'history ']) 
                Correction
            </a>

            @if(session('role') == 1 or session('role') == 2)
            <a href="core_smalls_verification" type="button" class="btn btn-secondary">
                @include('components.icon', ['icon' => 'check ']) 
                Verification
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('core_small.create')
@include('core_small.edit')
@include('core_small.delete')
@endsection
