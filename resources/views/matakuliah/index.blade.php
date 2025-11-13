<!-- resources/views/matakuliah/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mata Kuliah - Sistem Peringatan Dini</title>
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
                <a class="nav-link" href="/peringatan"><i class="fas fa-exclamation-circle"></i> Peringatan Dini</a>
                <a class="nav-link active" href="/matakuliah"><i class="fas fa-book"></i> Mata Kuliah</a>
                <a href="{{ route('mahasiswa.transkrip', $mhs->id) }}" class="btn btn-info btn-sm" title="Lihat Transkrip">
    📊 Transkrip
</a>
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
            <h1><i class="fas fa-book"></i> Mata Kuliah</h1>
            <span class="badge bg-primary fs-6">Program Studi: {{ $user->program_studi }}</span>
        </div>

        <!-- Statistik -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body text-center">
                        <h3>{{ $stats['total'] }}</h3>
                        <p>Total Mata Kuliah</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body text-center">
                        <h3>{{ $stats['wajib'] }}</h3>
                        <p>Wajib</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body text-center">
                        <h3>{{ $stats['pilihan'] }}</h3>
                        <p>Pilihan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body text-center">
                        <h3>{{ $stats['total_sks'] }}</h3>
                        <p>Total SKS</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Mata Kuliah per Semester -->
        <div class="mt-4">
            @foreach($matakuliahBySemester as $semester => $matakuliahSemester)
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-layer-group"></i> Semester {{ $semester }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Jenis</th>
                                    <th>Program Studi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matakuliahSemester as $mk)
                                <tr>
                                    <td><strong>{{ $mk->kode_mk }}</strong></td>
                                    <td>{{ $mk->nama_mk }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-dark">{{ $mk->sks }} SKS</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $mk->jenis == 'wajib' ? 'primary' : 'success' }}">
                                            {{ ucfirst($mk->jenis) }}
                                        </span>
                                    </td>
                                    <td>{{ $mk->program_studi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>