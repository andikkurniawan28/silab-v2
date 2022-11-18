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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Data Proses') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Admin</th>
                            <th>Created @</th>
                            @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                                <th>Updated @</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arounds as $around)
                        <tr>
                            <td>{{ $around->id }}</td>
                            <td>{{ $around->admin }}</td>
                            <td>{{ $around->created_at }}</td>
                            @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                                <td>{{ $around->updated_at }}</td>
                            @endif
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#show{{ $around->id }}">
                                    @include('components.icon', ['icon' => 'eye '])
                                    Show
                                </button>
                                @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $around->id }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $around->id }}">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
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
@include('around.create')
@include('around.show')
@include('around.edit')
@include('around.delete')
@endsection
