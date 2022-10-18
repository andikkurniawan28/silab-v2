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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('special') }} Verification</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('specials.verify') }}">
                @csrf
                @method('POST')
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
                            <th>Admin</th>
                            <th>Created @</th>
                            <th>Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specials as $special)
                        <tr>
                            <td>{{ $special->id }}</td>
                            <td>{{ $special->material_name }} <sub>({{ $special->sample_id }})</sub></td>
                            <td>{{ $special->tsai }}</td>
                            <td>{{ $special->glucose }}</td>
                            <td>{{ $special->fructose }}</td>
                            <td>{{ $special->sucrose }}</td>
                            <td>{{ $special->preparation_index }}</td>
                            <td>{{ $special->fiber }}</td>
                            <td>{{ $special->calcium }}</td>
                            <td>{{ $special->optical_density }}</td>
                            <td>{{ $special->sugar_reducted }}</td>
                            <td>{{ $special->admin }}</td>
                            <td>{{ $special->created_at }}</td>
                            <td>
                                <input type="checkbox" name="checkAll[]" class="checkSingle" value="{{ $special->id }}">
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
            <a href="{{ route('specials.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection

