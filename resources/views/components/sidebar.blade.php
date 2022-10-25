<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">
   
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="/admin_template/img/QC.png" width="50" height="50" alt="Logo QC">
        </div>
        <div class="sidebar-brand-text mx-3">SILAB</div>
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
                <a class="collapse-item" href="{{ route('balances.index') }}">Balance</a>
                <a class="collapse-item" href="{{ route('chemicals.index') }}">Chemical</a>
                <a class="collapse-item" href="{{ route('imbibitions.index') }}">Imbibisi</a>
                <a class="collapse-item" href="{{ route('arounds.index') }}">Keliling</a>
                <a class="collapse-item" href="{{ route('taxations.index') }}">Taksasi</a>
                <a class="collapse-item" href="{{ route('mollases.index') }}">Tangki Tetes</a>
                {{-- <a class="collapse-item" href="">Timbangan Tetes</a>
                <a class="collapse-item" href="">Timbangan RS In</a>
                <a class="collapse-item" href="">Timbangan RS Out</a> --}}
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('analysis_result') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Analysis Result</span></a>
    </li>

    @if(session('role') == 1 or session('role') == 2 or session('role') == 3)

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Input</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('materials.index') }}">Material</a>
                <a class="collapse-item" href="{{ route('saccharomats.index') }}">Saccharomat</a>
                <a class="collapse-item" href="{{ route('coloromats.index') }}">Coloromat</a>
                <a class="collapse-item" href="{{ route('moistures.index') }}">Moisture</a>
                <a class="collapse-item" href="{{ route('baggases.index') }}">Ampas</a>
                <a class="collapse-item" href="{{ route('umums.index') }}">Umum</a>
                <a class="collapse-item" href="{{ route('boilers.index') }}">Ketel</a>
                <a class="collapse-item" href="{{ route('sugars.index') }}">SO<sub>2</sub> & BJB</a>
                <a class="collapse-item" href="{{ route('specials.index') }}">Khusus</a>
                <a class="collapse-item" href="{{ route('core_samples.index') }}">Core Sample</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-print"></i>
            <span>Documentation</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('reports') }}">Report</a>
                <a class="collapse-item" href="{{ route('certificates') }}">Certificate of Analysis</a>
            </div>
        </div>
    </li>

    @endif

    @if(session('role') == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('samples.index') }}">Sample</a>
                <a class="collapse-item" href="{{ route('users.index') }}">User</a>
                <a class="collapse-item" href="{{ route('stations.index') }}">Station</a>
                <a class="collapse-item" href="{{ route('methods.index') }}">Method</a>
                <a class="collapse-item" href="{{ route('cooperatives.index') }}">KUD</a>
                <a class="collapse-item" href="{{ route('outposts.index') }}">Pos Pantau</a>
                <a class="collapse-item" href="{{ route('programs.index') }}">Program</a>
                <a class="collapse-item" href="{{ route('factors.index') }}">Factor</a>
                <a class="collapse-item" href="{{ route('activity_log') }}">Log</a>
                
                @if(session('name') == 'Andik Kurniawan')
                    <a class="collapse-item" href="{{ route('roles.index') }}">Role</a>
                @endif
                
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