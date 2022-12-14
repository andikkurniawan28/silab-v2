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
            <h5 class="m-0 font-weight-bold text-primary">Data Analisa {{ ucfirst('Core Sample') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barcode</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Rend</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_samples as $core_sample)
                        <tr>
                            <td>{{ $core_sample->id }}</td>
                            <td>
                                @if($core_sample->register != NULL)
                                <a href="#" data-toggle="modal" data-target="#show{{ $core_sample->id }}">{{ $core_sample->barcode }}</a>
                                @else
                                {{ $core_sample->barcode }}
                                @endif
                            </td>
                            <td>{{ $core_sample->percent_brix }}</td>
                            <td>{{ $core_sample->percent_pol }}</td>
                            <td>{{ $core_sample->yield }}</td>
                            <td>
                                @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $core_sample->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $core_sample->id }}">
                                        @include('components.icon', ['icon' => 'trash '])
                                        Delete
                                    </button>
                                @else
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock '])
                                            Locked
                                        </span>
                                    </h4>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </button>
            @endif
            <a href="core_samples_correction" type="button" class="btn btn-info" target="_blank">
                @include('components.icon', ['icon' => 'history '])
                Correction
            </a>

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('core_sample.create')
@include('core_sample.show')
@include('core_sample.edit')
@include('core_sample.delete')
@endsection
