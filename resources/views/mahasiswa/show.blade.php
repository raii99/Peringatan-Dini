<!DOCTYPE html>
<html>
<head>
    <title>Detail Mahasiswa - Sistem Peringatan Dini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <i class="fas fa-exclamation-triangle"></i>
                Sistem Peringatan Dini
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a class="nav-link" href="/mahasiswa"><i class="fas fa-users"></i> Mahasiswa</a>
                <span class="navbar-text me-3">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </span>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-user-graduate"></i> Detail Mahasiswa</h1>
            <a href="/mahasiswa" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Informasi Mahasiswa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">NIM</th>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $mahasiswa->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $mahasiswa->email }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $mahasiswa->program_studi }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">Semester</th>
                                <td>
                                    <span class="badge bg-primary">Semester {{ $mahasiswa->semester }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>IPK</th>
                                <td>
                                    <span class="badge {{ $mahasiswa->ipk >= 3.0 ? 'bg-success' : ($mahasiswa->ipk >= 2.0 ? 'bg-warning' : 'bg-danger') }} fs-6">
                                        {{ number_format($mahasiswa->ipk, 2) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Total SKS</th>
                                <td>{{ $mahasiswa->total_sks }} SKS</td>
                            </tr>
                            <tr>
                                <th>Status Akademik</th>
                                <td>
                                    @if($mahasiswa->ipk >= 3.0)
                                        <span class="badge bg-success">Baik</span>
                                    @elseif($mahasiswa->ipk >= 2.0)
                                        <span class="badge bg-warning">Cukup</span>
                                    @else
                                        <span class="badge bg-danger">Perlu Perhatian</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Info Tambahan -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h6>Analisis Akademik:</h6>
                        <div class="alert 
                            @if($mahasiswa->ipk >= 3.0) alert-success
                            @elseif($mahasiswa->ipk >= 2.0) alert-warning
                            @else alert-danger @endif">
                            @if($mahasiswa->ipk >= 3.0)
                                <i class="fas fa-check-circle"></i> 
                                <strong>Baik:</strong> Mahasiswa memiliki prestasi akademik yang baik.
                            @elseif($mahasiswa->ipk >= 2.0)
                                <i class="fas fa-exclamation-triangle"></i>
                                <strong>Cukup:</strong> Perlu peningkatan dalam belajar.
                            @else
                                <i class="fas fa-exclamation-circle"></i>
                                <strong>Perhatian:</strong> Memerlukan bimbingan akademik intensif.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>