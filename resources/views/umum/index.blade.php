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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('umum') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>CaO</th>
                            <th>pH</th>
                            <th>Turbidity</th>
                            <th>Temperature</th>
                            <th>Admin</th>
                            <th>Master</th>
                            <th>Created @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umums as $umum)
                        <tr>
                            <td>{{ $umum->id }}</td>
                            <td>{{ $umum->material_name }} <sub>({{ $umum->sample_id }})</sub></td>
                            <td>{{ $umum->cao }}</td>
                            <td>{{ $umum->ph }}</td>
                            <td>{{ $umum->turbidity }}</td>
                            <td>{{ $umum->temperature }}</td>
                            <td>{{ $umum->admin }}</td>
                            <td>{{ $umum->master }}</td>
                            <td>{{ $umum->created_at }}</td>
                            <td>
                                @if($umum->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $umum->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $umum->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
                                    </button>
                                @elseif($umum->is_verified == 1 && session('role') != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock ']) 
                                            Locked
                                        </span>
                                    </h4>
                                @elseif($umum->is_verified == 1 && session('role') == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $umum->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $umum->id }}">
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
            <a href="umums_correction" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'history ']) 
                Correction
            </a>

            @if(session('role') == 1 or session('role') == 2)
            <a href="umums_verification" type="button" class="btn btn-secondary">
                @include('components.icon', ['icon' => 'check ']) 
                Verification
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('umum.create')
@include('umum.edit')
@include('umum.delete')
@endsection
