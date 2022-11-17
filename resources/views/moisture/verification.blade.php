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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('moisture') }} Verification</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('moistures.verify') }}">
                @csrf
                @method('POST')
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Moisture<sub>(%)</sub></th>
                            <th>Analyst</th>
                            <th>Created @</th>
                            <th>Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($moistures as $moisture)
                        <tr>
                            <td>{{ $moisture->id }}</td>
                            <td>{{ $moisture->sample->material->name }} <sub>({{ $moisture->sample_id }})</sub></td>
                            <td>{{ $moisture->moisture }}</td>
                            <td>{{ $moisture->analyst }}</td>
                            <td>{{ $moisture->created_at }}</td>
                            <td>
                                <input type="checkbox" name="checkAll[]" class="checkSingle" value="{{ $moisture->id }}">
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
            <a href="{{ route('moistures.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left '])
                Back
            </a>
        </div>
    </div>
</div>
@endsection

