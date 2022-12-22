@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Taksasi Tetes</h1>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <!-- Content Row -->
    <div class="row">

        @include('mollase.cards')

    </div>

    @if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2 || Auth()->user()->role_id == 3)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            @include('components.icon', ['icon' => 'plus '])
            Tambah
        </button>

        <a href="{{ route('mollases.index') }}" target="_blank" class="btn btn-secondary shadow-sm">
            <i  class="fas fa-table fa-sm text-white-50"></i> Semua Data
        </a>
    @endif

</div>
@endsection

@section('modal')
@include('mollase.create')
@include('mollase.edit')
@include('mollase.delete')
@endsection
