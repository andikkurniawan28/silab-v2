@extends('layouts.app4')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Meja Tebu {{ $nomor_meja }}</h1>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        Scan Barcode Anda
                        <form method="POST" action="{{ route('rafactions.store') }}" class="text-dark" >
                            @csrf
                            @method('POST')
                            <input type="hidden" name="spot" value="{{ $nomor_meja }}" class="form-control">
                            <input type="text" name="barcode" value="" class="form-control" autofocus>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection