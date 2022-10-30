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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Core Sample') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barcode</th>
                            <th>Spot</th>
                            <th>Batch</th>
                            <th>Register</th>
                            <th>Vehicle</th>
                            <th>KUD</th>
                            <th>Pos</th>
                            <th>Program</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Yield</th>
                            <th>Analyst</th>
                            <th>Created @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_samples as $core_sample)
                        <tr>
                            <td>{{ $core_sample->id }}</td>
                            <td>{{ $core_sample->barcode }}</td>
                            <td>{{ $core_sample->spot }}</td>
                            <td>{{ $core_sample->batch }}</td>
                            <td>{{ $core_sample->register }}</td>
                            <td>{{ $core_sample->vehicle }}</td>
                            <td>{{ $core_sample->cooperative }}</td>
                            <td>{{ $core_sample->outpost }}</td>
                            <td>{{ $core_sample->program }}</td>
                            <td>{{ $core_sample->percent_brix }}</td>
                            <td>{{ $core_sample->percent_pol }}</td>
                            <td>{{ $core_sample->yield }}</td>
                            <td>{{ $core_sample->analyst }}</td>
                            <td>{{ $core_sample->created_at }}</td>
                            <td>
                                @if(session('role') == 1 || session('role') == 2)
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus ']) 
                Create
            </button>
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
@include('core_sample.edit')
@include('core_sample.delete')
@endsection
