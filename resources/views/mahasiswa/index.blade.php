<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --danger: #e74c3c;
        }
        
        .sidebar {
            background: linear-gradient(135deg, var(--primary), #2980b9);
            color: white;
            height: 100vh;
            position: fixed;
            width: 250px;
        }
        
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .nav-link {
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 5px 10px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .status-aktif { background: rgba(39, 174, 96, 0.1); color: var(--success); border: 1px solid var(--success); }
        .status-waspada { background: rgba(243, 156, 18, 0.1); color: var(--warning); border: 1px solid var(--warning); }
        .status-berisiko { background: rgba(231, 76, 60, 0.1); color: var(--danger); border: 1px solid var(--danger); }
        
        .btn-action {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .btn-view { background: rgba(52, 152, 219, 0.1); color: var(--primary); }
        .btn-edit { background: rgba(243, 156, 18, 0.1); color: var(--warning); }
        .btn-delete { background: rgba(231, 76, 60, 0.1); color: var(--danger); }
        
        .table th {
            background: linear-gradient(135deg, var(--primary), #2980b9);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4><i class="fas fa-graduation-cap"></i> Akademik</h4>
        </div>
        <div class="sidebar-menu pt-3">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="nav-link active">
                <i class="fas fa-user-graduate me-2"></i> Data Mahasiswa
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-file-alt me-2"></i> Transkrip Nilai
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-clipboard-list me-2"></i> KRS & KHS
            </a>
            <div class="mt-5 pt-5 border-top">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link w-100 text-start bg-transparent border-0">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1"><i class="fas fa-user-graduate me-2"></i>Data Mahasiswa</h2>
                <p class="text-muted mb-0">Manajemen data mahasiswa Teknik Informatika</p>
            </div>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Mahasiswa
            </a>
        </div>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Angkatan</th>
                                <th>IPK</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mahasiswa as $mhs)
                            <tr>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->email }}</td>
                                <td>{{ $mhs->angkatan }}</td>
                                <td>{{ $mhs->ipk ?? '-' }}</td>
                                <td>
                                    <span class="badge status-{{ $mhs->status }}">
                                        {{ ucfirst($mhs->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-action btn-view" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-action btn-edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-action btn-delete" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-user-slash fa-2x mb-3"></i><br>
                                    Belum ada data mahasiswa
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>