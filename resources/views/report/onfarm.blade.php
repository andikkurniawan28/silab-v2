@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">On Farm Report</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

     <!-- Content Row -->
     <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-12">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     </div>

</div>

@endsection


