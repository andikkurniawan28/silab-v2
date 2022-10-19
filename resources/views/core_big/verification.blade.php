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
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Core Sample EB') }} Verification</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('core_bigs.verify') }}">
                @csrf
                @method('POST')
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barcode</th>
                            <th>Register</th>
                            <th>KUD</th>
                            <th>Pos</th>
                            <th>Program</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Yield</th>
                            <th>Admin</th>
                            <th>Created @</th>
                            <th>Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_bigs as $core_big)
                        <tr>
                            <td>{{ $core_big->id }}</td>
                            <td>{{ $core_big->barcode }}</td>
                            <td>{{ $core_big->register }}</td>
                            <td>{{ $core_big->cooperative }}</td>
                            <td>{{ $core_big->outpost }}</td>
                            <td>{{ $core_big->program }}</td>
                            <td>{{ $core_big->percent_brix }}</td>
                            <td>{{ $core_big->percent_pol }}</td>
                            <td>{{ $core_big->yield }}</td>
                            <td>{{ $core_big->admin }}</td>
                            <td>{{ $core_big->created_at }}</td>
                            <td>
                                <input type="checkbox" name="checkAll[]" class="checkSingle" value="{{ $core_big->id }}">
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
            <a href="{{ route('core_bigs.index') }}" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'arrow-left ']) 
                Back
            </a>
        </div>
    </div>
</div>
@endsection

