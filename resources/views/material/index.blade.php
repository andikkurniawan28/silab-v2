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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('material') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Station</th>
                            <th>Method</th>
                            <th>Admin</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $material)
                        <tr>
                            <td>{{ $material->id }}</td>
                            <td>{{ $material->name }}</td>
                            <td>{{ $material->station_name }} <sub>({{ $material->station_id }})</sub></td>
                            <td>{{ $material->method_name }} <sub>({{ $material->method_id }})</sub></td>
                            <td>{{ $material->admin }}</td>
                            <td>{{ $material->created_at }}</td>
                            <td>{{ $material->updated_at }}</td>
                            <td>
                                @if(Auth()->user()->role_id != 1)
                                <h4>
                                    <span class="badge badge-warning text-dark">
                                        @include('components.icon', ['icon' => 'lock ']) 
                                        Locked
                                    </span>
                                </h4>
                                @elseif(Auth()->user()->role_id == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $material->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $material->id }}">
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
        </div>
    </div>
</div>
@endsection

@section('modal')
@include('material.create')
@include('material.edit')
@include('material.delete')
@endsection
