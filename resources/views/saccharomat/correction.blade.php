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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('saccharomat') }} Correction</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Brix<sub>(%)</sub></th>
                            <th>Pol<sub>(%)</sub></th>
                            <th>Pol</th>
                            <th>Purity<sub>(%)</sub></th>
                            <th>Yield</th>
                            <th>Corrector</th>
                            {{-- <th>Master</th> --}}
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saccharomats as $saccharomat)
                        <tr>
                            <td>{{ $saccharomat->id }}</td>
                            <td>{{ $saccharomat->material_name }} <sub>({{ $saccharomat->sample_id }})</sub></td>
                            <td>
                                {{ $saccharomat->percent_brix_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $saccharomat->percent_brix }}
                            </td>
                            <td>
                                {{ $saccharomat->percent_pol_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $saccharomat->percent_pol }}
                            </td>
                            <td>
                                {{ $saccharomat->pol_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $saccharomat->pol }}
                            </td>
                            <td>
                                {{ $saccharomat->purity_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $saccharomat->purity }}
                            </td>
                            <td>
                                {{ $saccharomat->yield_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $saccharomat->yield }}
                            </td>
                            <td>{{ $saccharomat->corrector }}</td>
                            {{-- <td>{{ $saccharomat->master }}</td> --}}
                            <td>{{ $saccharomat->created_at }}</td>
                            <td>{{ $saccharomat->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('saccharomats.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection
