@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('analysis_result') }}">Analysis Result</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

     <!-- Content Row -->
     <div class="row">

        @foreach($datas as $data)
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-12">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="{{ route('sample_result', $data->id) }}">{{ $data->name }}</a>
                            </div>
                            <div class="table-responsive">
                            <table width="100%" class="table table-sm table-hovered text-center">
                                <tr>
                                    <th>Time</th>
                                    <th>ID</th>
                                    @include('station_result.determine_header', [ 'method' => $data->method_id, ])
                                </tr>
                                @foreach($data->analysis_result as $analysis)
                                <tr>
                                    <td>{{ date('H:i', strtotime($analysis->created_at ))}}</td>
                                    <td>{{ $analysis->id }}</td>
                                    @include('station_result.determine_body', [ 'method' => $data->method_id, ])
                                </tr>
                                @endforeach
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

     </div>

</div>

@endsection


