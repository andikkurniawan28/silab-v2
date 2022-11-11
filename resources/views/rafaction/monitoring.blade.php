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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Penilaian MBS') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barcode</th>
                            <th>Score</th>
                            <th>Created @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rafactions as $rafaction)
                        <tr>
                            <td>{{ $rafaction->id }}</td>
                            <td>
                                @if($rafaction->register != NULL)
                                <a href="#" data-toggle="modal" data-target="#show{{ $rafaction->id }}">{{ $rafaction->barcode }}</a>
                                @else
                                {{ $rafaction->barcode }}
                                @endif
                            </td>
                            <td>{{ $rafaction->score }}</td>
                            <td>{{ $rafaction->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('rafaction.show')
@endsection
