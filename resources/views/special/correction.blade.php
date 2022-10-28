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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Analisa Khusus') }} Correction</h5>
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
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specials as $special)
                        <tr>
                            <td>{{ $special->id }}</td>
                            <td>{{ $special->material_name }} <sub>({{ $special->sample_id }})</sub></td>
                            <td>
                                {{ $special->tsai_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->tsai }}
                            </td>
                            <td>
                                {{ $special->glucose_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->glucose }}
                            </td>
                            <td>
                                {{ $special->fructose_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->fructose }}
                            </td>
                            <td>
                                {{ $special->sucrose_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->sucrose }}
                            </td>
                            <td>
                                {{ $special->preparation_index_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->preparation_index }}
                            </td>
                            <td>
                                {{ $special->fiber_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->fiber }}
                            </td>
                            <td>
                                {{ $special->calcium_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->calcium }}
                            </td>
                            <td>
                                {{ $special->optical_density_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->optical_density }}
                            </td>
                            <td>
                                {{ $special->sugar_reducted_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $special->sugar_reducted }}
                            </td>
                            <td>{{ $special->corrector }}</td>
                            <td>{{ $special->created_at }}</td>
                            <td>{{ $special->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('specials.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection
