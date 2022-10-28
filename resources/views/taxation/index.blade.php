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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Taksasi In Proses') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Admin</th>
                            <th>Created @</th>

                            @if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 4)
                                <th>Updated @</th>
                            @endif

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taxations as $taxation)
                        <tr>
                            <td>{{ $taxation->id }}</td>
                            <td>{{ $taxation->admin }}</td>
                            <td>{{ $taxation->created_at }}</td>
                            
                            @if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 4)
                                <td>{{ $taxation->updated_at }}</td>
                            @endif

                                <td>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#show{{ $taxation->id }}">
                                        @include('components.icon', ['icon' => 'eye ']) 
                                        Show
                                    </button>

                                    @if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 4)
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $taxation->id }}">
                                            @include('components.icon', ['icon' => 'edit ']) 
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $taxation->id }}">
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
            @if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 4)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus ']) 
                Create
            </button>
            @endif
        </div>
    </div>
</div>
@endsection

@section('modal')
@include('taxation.create')
@include('taxation.show')
@include('taxation.edit')
@include('taxation.delete')
@endsection
