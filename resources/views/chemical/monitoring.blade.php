@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bahan Kimia</h1>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <!-- Content Row -->
    <div class="row">

        @include('chemical.cards')
    
    </div>

    @if(session('role') == 1 || session('role') == 2 || session('role') == 3)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            @include('components.icon', ['icon' => 'plus ']) 
            Create
        </button>

        <a href="{{ route('chemicals.index') }}" target="_blank" class="btn btn-secondary shadow-sm">
            <i  class="fas fa-table fa-sm text-white-50"></i> All Data
        </a>
    @endif

    <br>
    <br>

</div>
@endsection

@section('modal')
@include('chemical.create')
@include('chemical.edit')
@include('chemical.delete')
@endsection
