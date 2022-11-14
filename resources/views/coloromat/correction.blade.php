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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('coloromat') }} Correction</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Icumsa<sub>(IU)</sub></th>
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coloromats as $coloromat)
                        <tr>
                            <td>{{ $coloromat->id }}</td>
                            <td>{{ $coloromat->material_name }} <sub>({{ $coloromat->sample_id }})</sub></td>
                            <td>
                                {{ $coloromat->icumsa_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $coloromat->icumsa }}
                            </td>
                            <td>{{ $coloromat->corrector }}</td>
                            <td>{{ $coloromat->created_at }}</td>
                            <td>{{ $coloromat->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('coloromats.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection
