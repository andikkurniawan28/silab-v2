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
            <h5 class="m-0 font-weight-bold text-primary">Data {{ ucfirst('Analisa Ketel') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>TDS</th>
                            <th>pH</th>
                            <th>Hardness</th>
                            <th>Phospat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boilers as $boiler)
                        <tr>
                            <td>{{ $boiler->id }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#show{{ $boiler->id }}">{{ $boiler->sample->material->name }}</a>
                            </td>
                            <td>{{ $boiler->tds }}</td>
                            <td>{{ $boiler->ph }}</td>
                            <td>{{ $boiler->hardness }}</td>
                            <td>{{ $boiler->phospate }}</td>
                            <td>
                                @if($boiler->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $boiler->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $boiler->id }}">
                                        @include('components.icon', ['icon' => 'trash '])
                                        Hapus
                                    </button>
                                @elseif($boiler->is_verified == 1 && Auth()->user()->role_id != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock '])
                                            Terkunci
                                        </span>
                                    </h4>
                                @elseif($boiler->is_verified == 1 && Auth()->user()->role_id == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $boiler->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $boiler->id }}">
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </button>
            <a href="boilers_correction" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'history '])
                Koreksi
            </a>

            @if(Auth()->user()->role_id == 1 or Auth()->user()->role_id == 2)
            <a href="boilers_verification" type="button" class="btn btn-secondary">
                @include('components.icon', ['icon' => 'check '])
                Verifikasi
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('boiler.create')
@include('boiler.show')
@include('boiler.edit')
@include('boiler.delete')
@endsection
