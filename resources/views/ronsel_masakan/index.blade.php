@extends('layouts.app3')

@section('content')
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <h1>Monitoring Masakan</h1>

    <p>(*) Data berdasarkan ronsel yang dibuat.</p>

    <!-- Content Row -->
    <div class="row">

        @foreach($materials as $material)
        <div class="col-lg-4 mb-4">
            @switch($material->id)
                @case(41)
                    <div class="card bg-primary text-white shadow">
                    @break
                @case(42)
                    <div class="card bg-secondary text-white shadow">
                    @break
                @case(43)
                    <div class="card bg-info text-white shadow">
                    @break
                @case(44)
                    <div class="card bg-success text-white shadow">
                    @break
                @case(45)
                    <div class="card bg-danger text-white shadow">
                    @break
                @case(46)
                    <div class="card bg-dark text-white shadow">
                    @break
                @case(47)
                    <div class="card bg-info text-white shadow">
                    @break
                @default
                    <div class="card bg-primary text-white shadow">
                    @break
            @endswitch
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        <h3 align="right"><strong><a href="{{ route('sample_result', $material->id) }}" class="text-light">{{ $material->name }}</a></strong></h3>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table width="100%" class="table table-sm table-hovered text-light">
                            <tr>
                                <th>Item</th>
                                <th>Yesterday</th>
                                <th>Today</th>
                                <th>Recap</th>
                            </tr>
                            <tr>
                                <th>Masakan Turun<sub>(X)</sub></th>
                                <th>{{ $material->qty_kemarin }}</th>
                                <th>{{ $material->qty_hari_ini }}</th>
                                <th>{{ $material->qty_sd_hari_ini }}</th>
                            </tr>
                            <tr>
                                <th>Volume<sub>(Hl)</sub></th>
                                <th>{{ $material->volume_kemarin }}</th>
                                <th>{{ $material->volume_hari_ini }}</th>
                                <th>{{ $material->volume_sd_hari_ini }}</th>
                            </tr>
                        </table>
                    </div>
                    <br>
                    @if(session('role') < 5)
                    <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#create{{ $material->id }}">
                        Create Ronsel 
                        @include('components.icon', ['icon' => 'file ']) 
                    </button>
                    @include('ronsel_masakan.create')
                    @endif
                </div>
            </div>
        </div>
        
        @endforeach

    </div>

</div>
@endsection

{{-- @section('modal')
@include('ronsel_masakan.create')
@endsection --}}
