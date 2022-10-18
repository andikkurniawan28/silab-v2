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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('boiler') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>TDS</th>
                            <th>pH</th>
                            <th>Hardness</th>
                            <th>Phospate</th>
                            <th>Admin</th>
                            <th>Master</th>
                            <th>Created @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boilers as $boiler)
                        <tr>
                            <td>{{ $boiler->id }}</td>
                            <td>{{ $boiler->material_name }} <sub>({{ $boiler->sample_id }})</sub></td>
                            <td>{{ $boiler->tds }}</td>
                            <td>{{ $boiler->ph }}</td>
                            <td>{{ $boiler->hardness }}</td>
                            <td>{{ $boiler->phospate }}</td>
                            <td>{{ $boiler->admin }}</td>
                            <td>{{ $boiler->master }}</td>
                            <td>{{ $boiler->created_at }}</td>
                            <td>
                                @if($boiler->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $boiler->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $boiler->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
                                    </button>
                                @elseif($boiler->is_verified == 1 && session('role') != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock ']) 
                                            Locked
                                        </span>
                                    </h4>
                                @elseif($boiler->is_verified == 1 && session('role') == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $boiler->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $boiler->id }}">
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
            <a href="boilers_correction" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'history ']) 
                Correction
            </a>

            @if(session('role') == 1 or session('role') == 2)
            <a href="boilers_verification" type="button" class="btn btn-secondary">
                @include('components.icon', ['icon' => 'check ']) 
                Verification
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('boiler.create')
@include('boiler.edit')
@include('boiler.delete')
@endsection
