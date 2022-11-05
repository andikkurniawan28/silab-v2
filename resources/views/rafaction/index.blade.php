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
                            <th>Register</th>
                            {{-- <th>Kendaraan</th> --}}
                            <th>KUD</th>
                            <th>Pos</th>
                            <th>Asal</th>
                            <th>Score</th>
                            <th>Analyst</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rafactions as $rafaction)
                        <tr>
                            <td>{{ $rafaction->id }}</td>
                            <td>{{ $rafaction->barcode }}</td>
                            <td>{{ $rafaction->spot }}</td>
                            <td>{{ $rafaction->register }}</td>
                            {{-- <td>{{ $rafaction->vehicle }}</td> --}}
                            <td>{{ $rafaction->cooperative }}</td>
                            <td>{{ $rafaction->outpost }}</td>
                            <td>{{ $rafaction->program }}</td>
                            <td>{{ $rafaction->score }}</td>
                            <td>{{ $rafaction->analyst }}</td>
                            <td>{{ $rafaction->created_at }}</td>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus']) 
                Create Rafaksi
            </button>
            
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createSKMT">
                @include('components.icon', ['icon' => 'file']) 
                Create SKMT
            </button>
        </div>
    </div>
</div>
@endsection

@section('modal')
@include('rafaction.create')
@include('rafaction.create_skmt')
@include('rafaction.edit')
@include('rafaction.delete')
@endsection
