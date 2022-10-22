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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('sugar') }} Verification</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('sugars.verify') }}">
                @csrf
                @method('POST')
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Sulphur</th>
                            <th>Diameter</th>
                            <th>Blackspot</th>
                            <th>Analyst</th>
                            <th>Created @</th>
                            <th>Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sugars as $sugar)
                        <tr>
                            <td>{{ $sugar->id }}</td>
                            <td>{{ $sugar->material_name }} <sub>({{ $sugar->sample_id }})</sub></td>
                            <td>{{ $sugar->sulphur }}</td>
                            <td>{{ $sugar->diameter }}</td>
                            <td>{{ $sugar->blackspot }}</td>
                            <td>{{ $sugar->analyst }}</td>
                            <td>{{ $sugar->created_at }}</td>
                            <td>
                                <input type="checkbox" name="checkAll[]" class="checkSingle" value="{{ $sugar->id }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <h5><input type="checkbox" name="checkedAll" id="checkedAll" /> SELECT ALL </h5>
            <button type="submit" class="btn btn-primary">
                @include('components.icon', ['icon' => 'check ']) 
                Verify
            </button>
            </form>
            <a href="{{ route('sugars.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection

