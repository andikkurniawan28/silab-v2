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
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Rend</th>
                            <th>Created @</th>
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
                            <td>{{ $core_sample->created_at }}</td>
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
@include('core_sample.show')
@endsection
