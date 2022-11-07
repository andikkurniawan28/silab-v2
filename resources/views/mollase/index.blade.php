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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Taksasi Tetes') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tangki1</th>
                            <th>Tangki2</th>
                            <th>Tangki3</th>
                            <th>Counter</th>
                            <th>Admin</th>
                            <th>Created @</th>

                            @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                                <th>Updated @</th>
                                <th>Action</th>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mollases as $mollase)
                        <tr>
                            <td>{{ $mollase->id }}</td>
                            <td>{{ $mollase->volume_t1 }}</td>
                            <td>{{ $mollase->volume_t2 }}</td>
                            <td>{{ $mollase->volume_t3 }}</td>
                            <td>{{ $mollase->meters }}</td>
                            <td>{{ $mollase->admin }}</td>
                            <td>{{ $mollase->created_at }}</td>

                            @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
                                <td>{{ $mollase->updated_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $mollase->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $mollase->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
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
                    Create
                </button>
            @endif
        </div>
    </div>
</div>
@endsection

@section('modal')
@include('mollase.create')
@include('mollase.edit')
@include('mollase.delete')
@endsection
