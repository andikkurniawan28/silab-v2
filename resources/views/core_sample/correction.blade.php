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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Core Sample') }} Correction</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barcode</th>
                            <th>Brix<sub>(%)</sub></th>
                            <th>Pol<sub>(%)</sub></th>
                            <th>Yield<sub>(%)</sub></th>
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_samples as $core_sample)
                        <tr>
                            <td>{{ $core_sample->id }}</td>
                            <td>{{ $core_sample->barcode }}</td>
                            <td>
                                {{ $core_sample->percent_brix_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $core_sample->percent_brix }}
                            </td>
                            <td>
                                {{ $core_sample->percent_pol_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $core_sample->percent_pol }}
                            </td>
                            <td>
                                {{ $core_sample->yield_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $core_sample->yield }}
                            </td>
                            <td>{{ $core_sample->corrector }}</td>
                            <td>{{ $core_sample->created_at }}</td>
                            <td>{{ $core_sample->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('core_samples.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection
