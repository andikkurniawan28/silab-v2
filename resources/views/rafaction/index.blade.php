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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Scoring MBS') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Antrian</th>
                            <th>Meja</th>
                            @if(Auth()->user()->role_id < 2)
                            <th>Score</th>
                            @endif
                            <th>Analyst</th>
                            <th>Scanned @</th>
                            @if(Auth()->user()->role_id < 2)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rafactions as $rafaction)
                        <tr>
                            <td>{{ $rafaction->id }}</td>
                            <td><a href="#" data-toggle="modal" data-target="#show{{ $rafaction->id }}">{{ $rafaction->barcode }}</a></td>
                            <td>{{ $rafaction->spot }}</td>
                            @if(Auth()->user()->role_id < 2)
                            <td>{{ $rafaction->score }}</td>
                            @endif
                            <td>{{ $rafaction->analyst }}</td>
                            <td>{{ $rafaction->created_at }}</td>
                            @if(Auth()->user()->role_id < 2)
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $rafaction->id }}">
                                    @include('components.icon', ['icon' => 'edit ']) 
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $rafaction->id }}">
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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meja_1">
                @include('components.icon', ['icon' => 'plus']) 
                Meja 1
            </button>

            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#meja_2">
                @include('components.icon', ['icon' => 'plus']) 
                Meja 2
            </button>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#meja_3">
                @include('components.icon', ['icon' => 'plus']) 
                Meja 3
            </button>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#meja_4">
                @include('components.icon', ['icon' => 'plus']) 
                Meja 4
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#meja_5">
                @include('components.icon', ['icon' => 'plus']) 
                Meja 5
            </button>
            
            <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#createSKMT">
                @include('components.icon', ['icon' => 'file']) 
                SKMT
            </button>
        </div>
    </div>
</div>
@endsection

@section('modal')
@include('rafaction.meja_1')
@include('rafaction.meja_2')
@include('rafaction.meja_3')
@include('rafaction.meja_4')
@include('rafaction.meja_5')
@include('rafaction.create_skmt')
@include('rafaction.show')
@include('rafaction.edit')
@include('rafaction.delete')
@endsection
