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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('sugar') }} Correction</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Sulphur</th>
                            <th>Diameter</th>
                            <th>Blackspot</th>
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sugars as $sugar)
                        <tr>
                            <td>{{ $sugar->id }}</td>
                            <td>{{ $sugar->material_name }} <sub>({{ $sugar->sample_id }})</sub></td>
                            <td>
                                {{ $sugar->sulphur_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $sugar->sulphur }}
                            </td>
                            <td>
                                {{ $sugar->diameter_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $sugar->diameter }}
                            </td>
                            <td>
                                {{ $sugar->blackspot_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $sugar->blackspot }}
                            </td>
                            <td>{{ $sugar->corrector }}</td>
                            <td>{{ $sugar->created_at }}</td>
                            <td>{{ $sugar->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('sugars.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection
