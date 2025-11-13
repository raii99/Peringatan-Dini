@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Mahasiswa Aktif</h5>
                                <h2 class="mb-1">{{ $mahasiswaAktif }}</h2>
                                <small class="opacity-75">Sedang aktif kuliah</small>
                            </div>
                            <div class="bg-success bg-opacity-25 rounded p-2">
                                <i class="fas fa-user-check fa-2x"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="progress bg-success bg-opacity-25" style="height: 6px;">
                                <div class="progress-bar bg-white" style="width: {{ ($mahasiswaAktif / $totalMahasiswa) * 100 }}%"></div>
                            </div>
                            <small class="opacity-75">{{ number_format(($mahasiswaAktif / $totalMahasiswa) * 100, 1) }}% dari total</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Status Waspada</h5>
                                <h2 class="mb-1">{{ $mahasiswaWaspada }}</h2>
                                <small class="opacity-75">Perlu perhatian khusus</small>
                            </div>
                            <div class="bg-warning bg-opacity-25 rounded p-2">
                                <i class="fas fa-exclamation-triangle fa-2x"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="progress bg-warning bg-opacity-25" style="height: 6px;">
                                <div class="progress-bar bg-white" style="width: {{ ($mahasiswaWaspada / $totalMahasiswa) * 100 }}%"></div>
                            </div>
                            <small class="opacity-75">{{ number_format(($mahasiswaWaspada / $totalMahasiswa) * 100, 1) }}% dari total</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Berisiko Tinggi</h5>
                                <h2 class="mb-1">{{ $mahasiswaBerisiko }}</h2>
                                <small class="opacity-75">Butuh intervensi segera</small>
                            </div>
                            <div class="bg-danger bg-opacity-25 rounded p-2">
                                <i class="fas fa-skull-crossbones fa-2x"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="progress bg-danger bg-opacity-25" style="height: 6px;">
                                <div class="progress-bar bg-white" style="width: {{ ($mahasiswaBerisiko / $totalMahasiswa) * 100 }}%"></div>
                            </div>
                            <small class="opacity-75">{{ number_format(($mahasiswaBerisiko / $totalMahasiswa) * 100, 1) }}% dari total</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats Row -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center py-3">
                        <h5 class="card-title mb-1">Total Mahasiswa</h5>
                        <h3 class="mb-1">{{ $totalMahasiswa }}</h3>
                        <small class="opacity-75">Semua angkatan</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body text-center py-3">
                        <h5 class="card-title mb-1">Rata-rata IPK</h5>
                        <h3 class="mb-1">{{ number_format($averageIpk, 2) }}</h3>
                        <small class="opacity-75">IPK keseluruhan</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-secondary text-white">
                    <div class="card-body text-center py-3">
                        <h5 class="card-title mb-1">Rata-rata SKS</h5>
                        <h3 class="mb-1">{{ $averageSks }}</h3>
                        <small class="opacity-75">SKS diselesaikan</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-dark text-white">
                    <div class="card-body text-center py-3">
                        <h5 class="card-title mb-1">Progress SKS</h5>
                        <h3 class="mb-1">{{ number_format($progressSks, 1) }}%</h3>
                        <small class="opacity-75">Penyelesaian SKS</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Status Akademik Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="statusChart" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Distribusi IPK</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="ipkChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="card">
            <div class="card-body text-center py-5">
                <h1>🎓 Selamat Datang di Sistem Akademik</h1>
                <p class="lead">Monitor status akademik mahasiswa dengan mudah</p>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-list me-2"></i>Lihat Data Mahasiswa
                </a>
            </div>
        </div>

        <!-- Recent Mahasiswa -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Mahasiswa Perlu Perhatian</h5>
                <button class="btn btn-sm btn-outline-primary" id="refreshRecent">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
            </div>
            <div class="card-body">
                @if($mahasiswaPerhatian->count() > 0)
                    <div class="list-group" id="recentMahasiswaList">
                        @foreach($mahasiswaPerhatian as $mhs)
                            @php
                                $badgeColor = $mhs->status == 'berisiko' ? 'bg-danger' : 
                                            ($mhs->status == 'waspada' ? 'bg-warning' : 'bg-secondary');
                                $icon = $mhs->status == 'berisiko' ? 'fa-skull-crossbones' : 
                                       ($mhs->status == 'waspada' ? 'fa-exclamation-triangle' : 'fa-info-circle');
                            @endphp
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">
                                        <i class="fas {{ $icon }} me-2 text-{{ $mhs->status == 'berisiko' ? 'danger' : ($mhs->status == 'waspada' ? 'warning' : 'secondary') }}"></i>
                                        {{ $mhs->nama }}
                                    </h6>
                                    <small class="text-muted">{{ $mhs->nim }} | Angkatan {{ $mhs->angkatan }}</small>
                                </div>
                                <div>
                                    <span class="badge bg-primary me-2">IPK: {{ number_format($mhs->ipk, 2) }}</span>
                                    <span class="badge {{ $badgeColor }}">{{ ucfirst($mhs->status) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center mb-0">Tidak ada mahasiswa yang perlu perhatian khusus.</p>
                @endif
            </div>
        </div>

        <!-- Angkatan Summary -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Summary Status per Angkatan</h5>
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-secondary" id="sortByAngkatan">
                        <i class="fas fa-sort-numeric-down"></i> Sort
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if($angkatanSummary->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped" id="angkatanTable">
                            <thead>
                                <tr>
                                    <th>Angkatan</th>
                                    <th>Total</th>
                                    <th>Aktif</th>
                                    <th>Waspada</th>
                                    <th>Berisiko</th>
                                    <th>Rata IPK</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($angkatanSummary as $summary)
                                    @php
                                        $total = $summary->total;
                                        $aktifPercentage = ($summary->aktif / $total) * 100;
                                        $waspadaPercentage = ($summary->waspada / $total) * 100;
                                        $risikoPercentage = ($summary->risiko / $total) * 100;
                                    @endphp
                                    <tr>
                                        <td><strong>{{ $summary->angkatan }}</strong></td>
                                        <td>{{ $total }} mhs</td>
                                        <td>
                                            <span class="badge bg-success">{{ $summary->aktif }}</span>
                                            <small class="text-muted">({{ number_format($aktifPercentage, 1) }}%)</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">{{ $summary->waspada }}</span>
                                            <small class="text-muted">({{ number_format($waspadaPercentage, 1) }}%)</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">{{ $summary->risiko }}</span>
                                            <small class="text-muted">({{ number_format($risikoPercentage, 1) }}%)</small>
                                        </td>
                                        <td>
                                            <span class="badge {{ $summary->avg_ipk >= 3.0 ? 'bg-success' : ($summary->avg_ipk >= 2.0 ? 'bg-warning' : 'bg-danger') }}">
                                                {{ number_format($summary->avg_ipk, 2) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($risikoPercentage > 20)
                                                <span class="badge bg-danger">Kritis</span>
                                            @elseif($waspadaPercentage > 30)
                                                <span class="badge bg-warning">Waspada</span>
                                            @else
                                                <span class="badge bg-success">Baik</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center mb-0">Belum ada data angkatan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    initCharts();
    initCardInteractions();
    initButtonHandlers();
});

function initCharts() {
    // Status Distribution Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Aktif', 'Waspada', 'Berisiko', 'Lulus', 'Lainnya'],
            datasets: [{
                data: [
                    {{ $statusData['aktif'] }},
                    {{ $statusData['waspada'] }},
                    {{ $statusData['berisiko'] }},
                    {{ $statusData['lulus'] }},
                    {{ $statusData['lainnya'] }}
                ],
                backgroundColor: [
                    '#2ecc71', '#f39c12', '#e74c3c', '#3498db', '#95a5a6'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((context.parsed / total) * 100);
                            return `${context.label}: ${context.parsed} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    // IPK Distribution Chart
    const ipkCtx = document.getElementById('ipkChart').getContext('2d');
    const ipkChart = new Chart(ipkCtx, {
        type: 'bar',
        data: {
            labels: ['< 1.5', '1.5 - 2.0', '2.0 - 2.5', '2.5 - 3.0', '3.0 - 3.5', '> 3.5'],
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: @json($ipkData),
                backgroundColor: [
                    '#e74c3c', '#f39c12', '#f1c40f', '#2ecc71', '#27ae60', '#3498db'
                ],
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, title: { display: true, text: 'Jumlah Mahasiswa' } },
                x: { title: { display: true, text: 'Rentang IPK' } }
            }
        }
    });
}

// ... (JavaScript functions tetap sama)
</script>
@endpush