@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Timbangan In Proses</h1>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    {{-- <p>*) Cut Off 05:00 - 04:59. </p> --}}

    <!-- Content Row -->
    <div class="row">
        @include('timbangan_in_proses.cards')
    </div>

</div>
@endsection
