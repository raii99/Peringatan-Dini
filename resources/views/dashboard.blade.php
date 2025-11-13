<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik</title>
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
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
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
        
        .stat-card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card.success { border-left: 4px solid var(--success); }
        .stat-card.warning { border-left: 4px solid var(--warning); }
        .stat-card.danger { border-left: 4px solid var(--danger); }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4><i class="fas fa-graduation-cap"></i> Akademik</h4>
        </div>
        <div class="sidebar-menu pt-3">
            <a href="{{ route('dashboard') }}" class="nav-link active">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('mahasiswa') }}" class="nav-link">
                <i class="fas fa-user-graduate me-2"></i> Data Mahasiswa
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-file-alt me-2"></i> Transkrip Nilai
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-clipboard-list me-2"></i> KRS & KHS
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-calendar-alt me-2"></i> Jadwal Kuliah
            </a>
            <div class="mt-5 pt-5 border-top">
                <a href="#" class="nav-link">
                    <i class="fas fa-user me-2"></i> Profile
                </a>
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
                <h2 class="mb-1">Dashboard Akademik</h2>
                <p class="text-muted mb-0">Sistem Monitoring Mahasiswa Teknik Informatika</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="position-relative">
                    <i class="fas fa-bell fs-5 text-muted"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div>
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <small class="text-muted">{{ Auth::user()->role }}</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card stat-card success h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-user-check fs-4"></i>
                            </div>
                            <span class="badge bg-success bg-opacity-25 text-success">
                                <i class="fas fa-arrow-up me-1"></i> +12
                            </span>
                        </div>
                        <h3 class="card-title fw-bold text-success">{{ $stats['mahasiswa_aktif'] }}</h3>
                        <p class="card-text text-muted mb-2">Mahasiswa Aktif</p>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                        <small class="text-muted">+12 dari bulan lalu</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card stat-card warning h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-exclamation-triangle fs-4"></i>
                            </div>
                            <span class="badge bg-warning bg-opacity-25 text-warning">
                                <i class="fas fa-arrow-up me-1"></i> +8
                            </span>
                        </div>
                        <h3 class="card-title fw-bold text-warning">{{ $stats['status_waspada'] }}</h3>
                        <p class="card-text text-muted mb-2">Status Waspada</p>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: 65%"></div>
                        </div>
                        <small class="text-muted">Perlu monitoring intensif</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card stat-card danger h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-skull-crossbones fs-4"></i>
                            </div>
                            <span class="badge bg-danger bg-opacity-25 text-danger">
                                <i class="fas fa-arrow-up me-1"></i> +5
                            </span>
                        </div>
                        <h3 class="card-title fw-bold text-danger">{{ $stats['berisiko_tinggi'] }}</h3>
                        <p class="card-text text-muted mb-2">Berisiko Tinggi</p>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-danger" style="width: 45%"></div>
                        </div>
                        <small class="text-muted">Butuh intervensi segera</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row g-4">
            <div class="col-md-8">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-bar me-2 text-primary"></i>
                            Distribusi Status Mahasiswa
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="statusChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-pie me-2 text-primary"></i>
                            Distribusi IPK
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="ipkChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Simple Chart Implementation
        document.addEventListener('DOMContentLoaded', function() {
            // Bar Chart
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'bar',
                data: {
                    labels: ['Aktif', 'Waspada', 'Berisiko'],
                    datasets: [{
                        label: 'Jumlah Mahasiswa',
                        data: [{{ $stats['mahasiswa_aktif'] }}, {{ $stats['status_waspada'] }}, {{ $stats['berisiko_tinggi'] }}],
                        backgroundColor: [
                            'rgba(39, 174, 96, 0.8)',
                            'rgba(243, 156, 18, 0.8)',
                            'rgba(231, 76, 60, 0.8)'
                        ],
                        borderColor: [
                            'rgba(39, 174, 96, 1)',
                            'rgba(243, 156, 18, 1)',
                            'rgba(231, 76, 60, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pie Chart
            const ipkCtx = document.getElementById('ipkChart').getContext('2d');
            new Chart(ipkCtx, {
                type: 'doughnut',
                data: {
                    labels: ['< 2.0', '2.0 - 2.5', '2.5 - 3.0', '3.0 - 3.5', '> 3.5'],
                    datasets: [{
                        data: [45, 120, 280, 350, 205],
                        backgroundColor: [
                            'rgba(231, 76, 60, 0.8)',
                            'rgba(243, 156, 18, 0.8)',
                            'rgba(241, 196, 15, 0.8)',
                            'rgba(46, 204, 113, 0.8)',
                            'rgba(39, 174, 96, 0.8)'
                        ]
                    }]
                }
            });
        });
    </script>
</body>
</html>