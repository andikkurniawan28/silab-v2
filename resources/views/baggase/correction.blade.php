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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Analisa Ampas') }} Correction</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Pol</th>
                            <th>ZK</th>
                            <th>Air</th>
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baggases as $baggase)
                        <tr>
                            <td>{{ $baggase->id }}</td>
                            <td>{{ $baggase->material_name }} <sub>({{ $baggase->sample_id }})</sub></td>
                            <td>
                                {{ $baggase->corrected_pol_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $baggase->corrected_pol }}
                            </td>
                            <td>
                                {{ $baggase->dry_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $baggase->dry }}
                            </td>
                            <td>
                                {{ $baggase->water_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $baggase->water }}
                            </td>
                            <td>{{ $baggase->corrector }}</td>
                            <td>{{ $baggase->created_at }}</td>
                            <td>{{ $baggase->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('baggases.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection
