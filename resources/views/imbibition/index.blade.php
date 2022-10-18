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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('imbibition') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Totalizer</th>
                            <th>Flow</th>
                            <th>Admin</th>
                            <th>Created @</th>
                            <th>Updated @</th>

                            @if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 4)
                                <th>Action</th>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imbibitions as $imbibition)
                        <tr>
                            <td>{{ $imbibition->id }}</td>
                            <td>{{ $imbibition->totalizer }}</td>
                            <td>{{ $imbibition->flow }}</td>
                            <td>{{ $imbibition->admin }}</td>
                            <td>{{ $imbibition->created_at }}</td>
                            <td>{{ $imbibition->updated_at }}</td>

                            @if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 4)
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $imbibition->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $imbibition->id }}">
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
@include('imbibition.create')
@include('imbibition.edit')
@include('imbibition.delete')
@endsection
