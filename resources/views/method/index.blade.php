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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('method') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Admin</th>
                            <th>Created @</th>
                            <th>Updated @</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($methods as $method)
                        <tr>
                            <td>{{ $method->id }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#show{{ $method->id }}">{{ $method->name }}</a>
                            </td>
                            {{-- <td>{{ $method->admin }}</td>
                            <td>{{ $method->created_at }}</td>
                            <td>{{ $method->updated_at }}</td> --}}
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $method->id }}">
                                    @include('components.icon', ['icon' => 'edit ']) 
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $method->id }}">
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
@include('method.create')
@include('method.show')
@include('method.edit')
@include('method.delete')
@endsection
