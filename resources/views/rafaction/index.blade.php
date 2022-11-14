@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 text-right">
            <h5 class="m-0 font-weight-bold text-primary text-left">{{ ucfirst('Scoring MBS') }}</h5>
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
                            {{-- <th>Analyst</th>
                            <th>Created @</th> --}}
                            @if(Auth()->user()->role_id < 2)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rafactions as $rafaction)
                        <tr>
                            <td>{{ $rafaction->id }}</td>
                            <td>
                                @if($rafaction->score != NULL)
                                <a href="#" data-toggle="modal" data-target="#show{{ $rafaction->id }}">{{ $rafaction->barcode }}</a>
                                @else
                                {{ $rafaction->barcode }}
                                @endif
                            </td>
                            <td>{{ $rafaction->spot }}</td>
                            @if(Auth()->user()->role_id < 2)
                            <td>{{ $rafaction->score }}</td>
                            @endif
                            {{-- <td>{{ $rafaction->analyst }}</td>
                            <td>{{ $rafaction->created_at }}</td> --}}
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
                                <a href="{{ route('skmts.show', $rafaction->id) }}" type="button" class="btn btn-info" target="_blank">
                                    @include('components.icon', ['icon' => 'print ']) 
                                    Print
                                </a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            @for($i=1; $i<=5; $i++)
            @switch($i)
                @case(1)
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meja_{{ $i }}">
                    @break
                @case(2)
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#meja_{{ $i }}">
                    @break
                @case(3)
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#meja_{{ $i }}">
                    @break
                @case(4)
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#meja_{{ $i }}">
                    @break
                @case(5)
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#meja_{{ $i }}">
                    @break
            @endswitch
                MEJA {{ $i }}
            </button>
            @endfor
            <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#createSKMT">
                @include('components.icon', ['icon' => 'camera']) 
                SKMT
            </button>
        </div>
    </div>
</div>
@endsection

@section('modal')

@for($i=1; $i<=5; $i++)
    @include('rafaction.meja_tebu', ['number' => $i])
@endfor

@include('rafaction.create_skmt')
@include('rafaction.show')
@include('rafaction.edit')
@include('rafaction.delete')
@endsection
