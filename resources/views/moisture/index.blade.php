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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('moisture') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Moisture<sub>(%)</sub></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($moistures as $moisture)
                        <tr>
                            <td>{{ $moisture->id }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#show{{ $moisture->id }}">{{ $moisture->sample->material->name }}</a>
                            </td>
                            <td>{{ $moisture->moisture }}</td>
                            <td>
                                @if($moisture->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $moisture->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $moisture->id }}">
                                        @include('components.icon', ['icon' => 'trash '])
                                        Delete
                                    </button>
                                @elseif($moisture->is_verified == 1 && Auth()->user()->role_id != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock '])
                                            Locked
                                        </span>
                                    </h4>
                                @elseif($moisture->is_verified == 1 && Auth()->user()->role_id == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $moisture->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $moisture->id }}">
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus '])
                Create
            </button>
            <a href="moistures_correction" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'history '])
                Correction
            </a>

            @if(Auth()->user()->role_id == 1 or Auth()->user()->role_id == 2)
            <a href="moistures_verification" type="button" class="btn btn-secondary">
                @include('components.icon', ['icon' => 'check '])
                Verification
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('moisture.create')
@include('moisture.show')
@include('moisture.edit')
@include('moisture.delete')
@endsection
