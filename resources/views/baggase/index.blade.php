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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Analisa Ampas') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <p class="mb-4">
                        Untuk material Ampas, <code>Corrected Pol = Pol Baca * Faktor</code> dari <a href="saccharomats" target="_blank">Saccharomat</a>. 
                        Untuk material Blotong, <code>Corrected Pol = Pol Baca</code> <a href="saccharomats" target="_blank">Saccharomat</a>. 
                    </p>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Pol</th>
                            <th>Dry</th>
                            <th>Water</th>
                            <th>Analyst</th>
                            <th>Master</th>
                            <th>Created @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baggases as $baggase)
                        <tr>
                            <td>{{ $baggase->id }}</td>
                            <td>{{ $baggase->material_name }} <sub>({{ $baggase->sample_id }})</sub></td>
                            <td>{{ $baggase->corrected_pol }}</td>
                            <td>{{ $baggase->dry }}</td>
                            <td>{{ $baggase->water }}</td>
                            <td>{{ $baggase->analyst }}</td>
                            <td>{{ $baggase->master }}</td>
                            <td>{{ $baggase->created_at }}</td>
                            <td>
                                @if($baggase->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $baggase->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $baggase->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
                                    </button>
                                @elseif($baggase->is_verified == 1 && Auth()->user()->role_id != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock ']) 
                                            Locked
                                        </span>
                                    </h4>
                                @elseif($baggase->is_verified == 1 && Auth()->user()->role_id == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $baggase->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $baggase->id }}">
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
            <a href="baggases_correction" type="button" class="btn btn-info" target="_blank">
                @include('components.icon', ['icon' => 'history ']) 
                Correction
            </a>

            @if(Auth()->user()->role_id == 1 or Auth()->user()->role_id == 2)
            <a href="baggases_verification" type="button" class="btn btn-secondary" target="_blank">
                @include('components.icon', ['icon' => 'check ']) 
                Verification
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('baggase.create')
@include('baggase.edit')
@include('baggase.delete')
@endsection
