<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">
   
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="/admin_template/img/QC.png" width="50" height="50" alt="Logo QC">
        </div>
        <div class="sidebar-brand-text mx-3">SILAB <sub>V2</sub></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-eye"></i>
            <span>Monitoring</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('ronsel_masakan') }}">Masakan</a>
                <a class="collapse-item" href="{{ route('balances.create') }}">Flow Nira Mentah</a>
                <a class="collapse-item" href="{{ route('imbibitions.create') }}">Imbibisi</a>
                <a class="collapse-item" href="{{ route('arounds.index') }}">Data Proses</a>
                <a class="collapse-item" href="{{ route('taxations.index') }}">Taksasi In Proses</a>
                <a class="collapse-item" href="{{ route('mollases.create') }}">Taksasi Tetes</a>
                <a class="collapse-item" href="{{ route('chemicals.create') }}">Bahan Kimia</a>
                <a class="collapse-item" href="{{ route('timbangan_in_proses') }}">Timbangan In Proses</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Hasil Analisa</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                @foreach($stations as $station)
                    <a class="collapse-item" href="{{ route('station_result', $station->id) }}">{{ $station->name }}</a>
                @endforeach
            </div>
        </div>
    </li>

    @if(session('role') == 1 or session('role') == 2 or session('role') == 3)

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('materials.index') }}">Material</a>
                <a class="collapse-item" href="{{ route('barcode_samples') }}">Barcode</a>
                <a class="collapse-item" href="{{ route('samples.index') }}">Sample</a>
                <a class="collapse-item" href="{{ route('saccharomats.index') }}">Saccharomat</a>
                <a class="collapse-item" href="{{ route('coloromats.index') }}">Coloromat</a>
                <a class="collapse-item" href="{{ route('moistures.index') }}">Moisture</a>
                <a class="collapse-item" href="{{ route('baggases.index') }}">Analisa Ampas</a>
                <a class="collapse-item" href="{{ route('umums.index') }}">Analisa Umum</a>
                <a class="collapse-item" href="{{ route('boilers.index') }}">Analisa Ketel</a>
                <a class="collapse-item" href="{{ route('sugars.index') }}">Analisa Gula</a>
                <a class="collapse-item" href="{{ route('specials.index') }}">Analisa Khusus</a>
                <a class="collapse-item" href="{{ route('core_samples.index') }}">Core Sample</a>
                <a class="collapse-item" href="{{ route('rejects.index') }}">Reject</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-file-signature"></i>
            <span>Dokumentasi</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('reports') }}">Laporan</a>
                <a class="collapse-item" href="{{ route('certificates') }}">Sertifikat</a>
            </div>
        </div>
    </li>

    @endif

    @if(session('role') == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-folder-tree"></i>
            <span>Administrasi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">User</a>
                <a class="collapse-item" href="{{ route('stations.index') }}">Station</a>
                <a class="collapse-item" href="{{ route('methods.index') }}">Method</a>
                <a class="collapse-item" href="{{ route('cooperatives.index') }}">KUD</a>
                <a class="collapse-item" href="{{ route('outposts.index') }}">Pos Pantau</a>
                <a class="collapse-item" href="{{ route('programs.index') }}">Asal Tebu</a>
                <a class="collapse-item" href="{{ route('factors.index') }}">Factor</a>
                <a class="collapse-item" href="{{ route('activity_log') }}">Log</a>
                
                {{-- @if(session('name') == 'Andik Kurniawan') --}}
                    <a class="collapse-item" href="{{ route('roles.index') }}">Role & Permission</a>
                {{-- @endif --}}
                
            </div>
        </div>
    </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->