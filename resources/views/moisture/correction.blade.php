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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('moisture') }} Correction</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Moisture<sub>(%)</sub></th>
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($moistures as $moisture)
                        <tr>
                            <td>{{ $moisture->id }}</td>
                            <td>{{ $moisture->sample->material->name }} <sub>({{ $moisture->sample_id }})</sub></td>
                            <td>
                                {{ $moisture->moisture_origin }}
                                @include('components.icon', ['icon' => 'arrow-right '])
                                {{ $moisture->moisture }}
                            </td>
                            <td>{{ $moisture->corrector }}</td>
                            <td>{{ $moisture->created_at }}</td>
                            <td>{{ $moisture->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('moistures.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left '])
                Back
            </a>
        </div>
    </div>
</div>
@endsection
