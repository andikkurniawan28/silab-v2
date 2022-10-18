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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('factor') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Admin</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($factors as $factor)
                        <tr>
                            <td>{{ $factor->id }}</td>
                            <td>{{ $factor->name }}</td>
                            <td>{{ $factor->value }}</td>
                            <td>{{ $factor->admin }}</td>
                            <td>{{ $factor->created_at }}</td>
                            <td>{{ $factor->updated_at }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $factor->id }}">
                                    @include('components.icon', ['icon' => 'edit ']) 
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $factor->id }}">
                                    @include('components.icon', ['icon' => 'trash ']) 
                                    Delete
                                </button>
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
@include('factor.create')
@include('factor.edit')
@include('factor.delete')
@endsection
