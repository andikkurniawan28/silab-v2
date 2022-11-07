@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barcode Sample</h1>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <!-- Content Row -->
    <div class="row">

        @foreach($materials as $material)
        <div class="col-lg-2 mb-4">
            @switch($material->station_id)
                @case(1)
                    <div class="card bg-primary text-white shadow">
                    @break
                @case(2)
                    <div class="card bg-secondary text-white shadow">
                    @break
                @case(3)
                    <div class="card bg-success text-white shadow">
                    @break
                @case(4)
                    <div class="card bg-warning text-black shadow">
                    @break
                @case(5)
                    <div class="card bg-danger text-white shadow">
                    @break
                @case(6)
                    <div class="card bg-info text-white shadow">
                    @break
                @case(7)
                    <div class="card bg-dark text-white shadow">
                    @break
                @case(8)
                    <div class="card bg-primary text-white shadow">
                    @break
                @case(9)
                    <div class="card bg-secondary text-white shadow">
                    @break
                @case(10)
                    <div class="card bg-success text-white shadow">
                    @break
                @case(11)
                    <div class="card bg-danger text-white shadow">
                    @break
                @default
                    <div class="card bg-primary text-white shadow">
                    @break
            @endswitch
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        {{ $material->name }}
                        <form method="POST" action="{{ route('barcode_samples') }}" class="text-dark" target="_blank">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="material_id" value={{ $material->id }}>
                            <button type="submit" class="btn btn-light text-dark">Print 
                                @include('components.icon', ['icon' => 'print'])
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>
@endsection