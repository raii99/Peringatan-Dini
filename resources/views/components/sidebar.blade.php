<div class="col-md-3 col-lg-2 sidebar">
    <div class="sidebar-header">
        <h4 class="mb-0"><i class="fas fa-graduation-cap"></i> Sistem Akademik</h4>
    </div>
    
    <div class="sidebar-menu">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('mahasiswa*') ? 'active' : '' }}" href="{{ url('/mahasiswa') }}">
                    <i class="fas fa-user-graduate"></i> Data Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('transkrip*') ? 'active' : '' }}" href="{{ url('/transkrip') }}">
                    <i class="fas fa-file-alt"></i> Transkrip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('lainnya*') ? 'active' : '' }}" href="{{ url('/lainnya') }}">
                    <i class="fas fa-cog"></i> Lainnya
                </a>
            </li>
        </ul>
        
        <hr style="border-color: rgba(255,255,255,0.1); margin: 20px 0;">
        
        <h6 class="px-3 text-uppercase text-muted small">Filter Angkatan</h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link filter-angkatan" href="#" data-angkatan="all">
                    <i class="fas fa-filter"></i> Semua Angkatan
                </a>
            </li>
            @foreach([2024, 2023, 2022, 2021] as $year)
            <li class="nav-item">
                <a class="nav-link filter-angkatan" href="#" data-angkatan="{{ $year }}">
                    <i class="fas fa-filter"></i> {{ $year }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>