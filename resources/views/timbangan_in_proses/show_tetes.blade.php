@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('timbangan_in_proses') }}">Timbangan In Proses</a></li>
        <li class="breadcrumb-item active" aria-current="page">Timbangan Tetes</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Timbangan Tetes') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Time</th>
                            <th>Bruto</th>
                            <th>Tarra</th>
                            <th>Netto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->time }}</td>
                            <td>{{ $data->bruto }}</td>
                            <td>{{ $data->tarra }}</td>
                            <td>{{ $data->netto }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTetes">
                @include('components.icon', ['icon' => 'edit']) 
                Adjust
            </button>
            @include('timbangan_in_proses.createTetes')
        </div>
    </div>
</div>
@endsection
