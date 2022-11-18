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
            <h5 class="m-0 font-weight-bold text-primary">Data {{ ucfirst('saccharomat') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover text-sm" id="dataTable" width="100%" cellspacing="0">
                    {{-- <p class="mb-4">Untuk material Gula & Raw Sugar, data yang diproses di hasil analisa adalah <code>HK</code> dengan rumus <code>( % Brix = 100 - % Moisture )</code>. Untuk material Ampas, Pol Baca nantinya akan dikoreksi di sesi
                        <a href="baggases" target="_blank">Analisa Ampas.</a> Untuk material Blotong, <code>( Pol Koreksi = Pol Baca ) </code>. Data yang ada pada tabel ini telah terkoreksi dengan faktor yang telah ditentukan oleh sistem.</p> --}}
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Brix<sub>(%)</sub></th>
                            <th>Pol<sub>(%)</sub></th>
                            <th>Pol</th>
                            <th>HK<sub>(%)</sub></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saccharomats as $saccharomat)
                        <tr>
                            <td>{{ $saccharomat->id }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#show{{ $saccharomat->id }}">{{ $saccharomat->sample->material->name }}</a>
                            </td>
                            <td>{{ $saccharomat->percent_brix }}</td>
                            <td>{{ $saccharomat->percent_pol }}</td>
                            <td>{{ $saccharomat->pol }}</td>
                            <td>{{ $saccharomat->purity }}</td>
                            <td>
                                @if($saccharomat->is_verified == 0)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $saccharomat->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $saccharomat->id }}">
                                        @include('components.icon', ['icon' => 'trash '])
                                        Hapus
                                    </button>
                                @elseif($saccharomat->is_verified == 1 && Auth()->user()->role_id != 1)
                                    <h4>
                                        <span class="badge badge-warning text-dark">
                                            @include('components.icon', ['icon' => 'lock '])
                                            Terkunci
                                        </span>
                                    </h4>
                                @elseif($saccharomat->is_verified == 1 && Auth()->user()->role_id == 1)
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{ $saccharomat->id }}">
                                        @include('components.icon', ['icon' => 'edit '])
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $saccharomat->id }}">
                                        @include('components.icon', ['icon' => 'trash '])
                                        Hapus
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </button>
            <a href="saccharomats_correction" type="button" class="btn btn-info">
                @include('components.icon', ['icon' => 'history '])
                Koreksi
            </a>

            @if(Auth()->user()->role_id == 1 or Auth()->user()->role_id == 2)
            <a href="saccharomats_verification" type="button" class="btn btn-secondary">
                @include('components.icon', ['icon' => 'check '])
                Verifikasi Mandor
            </a>
            @endif

        </div>
    </div>
</div>
@endsection

@section('modal')
@include('saccharomat.create')
@include('saccharomat.show')
@include('saccharomat.edit')
@include('saccharomat.delete')
@endsection
