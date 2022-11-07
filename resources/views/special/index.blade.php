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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Analisa Khusus') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>TSAI</th>
                            <th>Glucose</th>
                            <th>Fructose</th>
                            <th>Sucrose</th>
                            <th>PI</th>
                            <th>Fiber</th>
                            <th>Calcium</th>
                            <th>OD</th>
                            <th>Reducted</th>
                            <th>Analyst</th>
                            <th>Master</th>
                            <th>Created @</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specials as $special)
                        <tr>
                            <td>{{ $special->id }}</td>
                            <td>{{ $special->material_name }} <sub>({{ $special->sample_id }})</sub></td>
                            <td>{{ $special->tsai }}</td>
                            <td>{{ $special->glucose }}</td>
                            <td>{{ $special->fructose }}</td>
                            <td>{{ $special->sucrose }}</td>
                            <td>{{ $special->preparation_index }}</td>
                            <td>{{ $special->fiber }}</td>
                            <td>{{ $special->calcium }}</td>
                            <td>{{ $special->optical_density }}</td>
                            <td>{{ $special->sugar_reducted }}</td>
                            <td>{{ $special->analyst }}</td>
                            <td>{{ $special->master }}</td>
                            <td>{{ $special->created_at }}</td>
                            <td>
                                @if($special->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $special->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $special->id }}">
                                        @include('components.icon', ['icon' => 'trash ']) 
                                        Delete
                                    </button>
                                @elseif($special->is_verified == 1 && Auth()->user()->role_id != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock ']) 
                                            Locked
                                        </span>
                                    </h4>
                                @elseif($special->is_verified == 1 && Auth()->user()->role_id == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $special->id }}">
                                        @include('components.icon', ['icon' => 'edit ']) 
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $special->id }}">
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
            <a href="specials_correction" type="button" class="btn btn-info" target="_blank">
                @include('components.icon', ['icon' => 'history ']) 
                Correction
            </a>

            @if(Auth()->user()->role_id == 1 or Auth()->user()->role_id == 2)
            <a href="specials_verification" type="button" class="btn btn-secondary" target="_blank">
                @include('components.icon', ['icon' => 'check ']) 
                Verification
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('special.create')
@include('special.edit')
@include('special.delete')
@endsection
