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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Analisa Ketel') }} Correction</h5>
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
                            <th>Phospate</th>
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boilers as $boiler)
                        <tr>
                            <td>{{ $boiler->id }}</td>
                            <td>{{ $boiler->sample->material->name }} <sub>({{ $boiler->sample_id }})</sub></td>
                            <td>
                                {{ $boiler->tds_origin }}
                                @include('components.icon', ['icon' => 'arrow-right '])
                                {{ $boiler->tds }}
                            </td>
                            <td>
                                {{ $boiler->ph_origin }}
                                @include('components.icon', ['icon' => 'arrow-right '])
                                {{ $boiler->ph }}
                            </td>
                            <td>
                                {{ $boiler->hardness_origin }}
                                @include('components.icon', ['icon' => 'arrow-right '])
                                {{ $boiler->hardness }}
                            </td>
                            <td>
                                {{ $boiler->phospate_origin }}
                                @include('components.icon', ['icon' => 'arrow-right '])
                                {{ $boiler->phospate }}
                            </td>
                            <td>{{ $boiler->corrector }}</td>
                            <td>{{ $boiler->created_at }}</td>
                            <td>{{ $boiler->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('boilers.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left '])
                Back
            </a>
        </div>
    </div>
</div>
@endsection
