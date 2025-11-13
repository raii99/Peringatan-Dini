<!-- resources/views/peringatan/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Peringatan Dini - Sistem Peringatan Dini</title>
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
                <a class="nav-link active" href="/peringatan"><i class="fas fa-exclamation-circle"></i> Peringatan Dini</a>
                <span class="navbar-text me-3">
                    <i class="fas fa-user"></i> {{ $user->name }}
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
            <h1><i class="fas fa-exclamation-triangle"></i> Peringatan Dini</h1>
            <span class="badge bg-primary fs-6">Program Studi: {{ $user->program_studi }}</span>
        </div>

        <!-- Statistik -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body text-center">
                        <h3>{{ $stats['total'] }}</h3>
                        <p>Total Peringatan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger">
                    <div class="card-body text-center">
                        <h3>{{ $stats['tinggi'] }}</h3>
                        <p>Risiko Tinggi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body text-center">
                        <h3>{{ $stats['sedang'] }}</h3>
                        <p>Risiko Sedang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body text-center">
                        <h3>{{ $stats['rendah'] }}</h3>
                        <p>Risiko Rendah</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Peringatan -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list"></i> Daftar Peringatan Aktif
                </h5>
            </div>
            <div class="card-body">
                @if($peringatan->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Semester</th>
                                <th>IPS</th>
                                <th>SKS Diambil</th>
                                <th>SKS Lulus</th>
                                <th>Tingkat Risiko</th>
                                <th>Kategori</th>
                                <th>Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peringatan as $p)
                            <tr>
                                <td><strong>{{ $p->student->nim }}</strong></td>
                                <td>{{ $p->student->name }}</td>
                                <td class="text-center">{{ $p->semester }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $p->ips < 2.0 ? 'bg-danger' : ($p->ips < 2.5 ? 'bg-warning' : 'bg-success') }}">
                                        {{ number_format($p->ips, 2) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $p->sks_diambil }}</td>
                                <td class="text-center">{{ $p->sks_lulus }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $p->color }}">
                                        {{ ucfirst($p->tingkat_risiko) }}
                                    </span>
                                </td>
                                <td>{{ $p->kategori }}</td>
                                <td>
                                    <small>{{ $p->rekomendasi }}</small>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center text-muted py-4">
                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                    <h4>Tidak ada peringatan dini aktif</h4>
                    <p>Semua mahasiswa dalam kondisi baik</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>