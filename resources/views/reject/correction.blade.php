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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('reject') }} Correction</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Weight<sub>(Ku)</sub></th>
                            <th>Corrector</th>
                            <th>Created @</th>
                            <th>Updated @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rejects as $reject)
                        <tr>
                            <td>{{ $reject->id }}</td>
                            <td>
                                {{ $reject->weight_origin }} 
                                @include('components.icon', ['icon' => 'arrow-right '])  
                                {{ $reject->weight }}
                            </td>
                            <td>{{ $reject->corrector }}</td>
                            <td>{{ $reject->created_at }}</td>
                            <td>{{ $reject->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('rejects.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection
