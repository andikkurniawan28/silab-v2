@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Off Farm Report</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

     <!-- Content Row -->
     <div class="row">

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="font-weight-bold text-primary text-uppercase mb-1">
                        Laporan Lab QA
                    </div>
                    <form action="{{ route('lab_report') }}" method="POST" target="_blank">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="input-group">
                                <input id="text1" name="date" type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" name="shift">
                                    <option value="0">Harian</option>
                                    <option value="1">Pagi</option>
                                    <option value="2">Sore</option>
                                    <option value="3">Malam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="handling" value="print" class="btn btn-primary">Print Screen <i class='fas fa-print'></i></button>
                            <button type="submit" name="handling" value="export" class="btn btn-primary">Export <i class='fas fa-download'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     </div>

</div>

@endsection


