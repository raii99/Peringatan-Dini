<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai & IPS - Early Warning System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .table-container {
            overflow-x: auto;
            max-width: 100%;
        }
        table {
            min-width: 1200px;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-xl font-bold">
                        <i class="fas fa-exclamation-triangle mr-2"></i>EWS
                    </a>
                    <span class="text-sm opacity-75">Early Warning System</span>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('dashboard') }}" class="hover:bg-blue-500 px-3 py-2 rounded transition">
                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                    </a>
                    <a href="{{ route('mahasiswa.index') }}" class="hover:bg-blue-500 px-3 py-2 rounded transition">
                        <i class="fas fa-users mr-2"></i>Data Mahasiswa
                    </a>
                    <a href="{{ route('mahasiswa.nilai') }}" class="hover:bg-blue-500 px-3 py-2 rounded transition bg-blue-500">
                        <i class="fas fa-chart-bar mr-2"></i>Nilai & IPS
                    </a>
                    <a href="{{ route('mahasiswa.peringatan') }}" class="hover:bg-blue-500 px-3 py-2 rounded transition">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Peringatan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                <i class="fas fa-chart-bar mr-3 text-blue-600"></i>Nilai & IPS
            </h1>
            <p class="text-gray-600 mt-2">Detail Indeks Prestasi Semester (IPS) Mahasiswa - Semester 1-14</p>
        </div>

        <!-- Tabel IPS Mahasiswa -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="table-container">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sticky left-0 bg-gray-50">NAMA</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sticky left-16 bg-gray-50">NIM</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IPK</th>
                            @for($i = 1; $i <= 14; $i++)
                            <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider min-w-16">S{{ $i }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($mahasiswaAktif as $mhs)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 sticky left-0 bg-white">{{ $mhs->name }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 sticky left-16 bg-white">{{ $mhs->nim }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                <span class="font-bold {{ $mhs->ipk < 2.0 ? 'text-red-600' : ($mhs->ipk < 2.5 ? 'text-yellow-600' : 'text-green-600') }}">
                                    {{ number_format($mhs->ipk, 2) }}
                                </span>
                            </td>
                            @for($i = 1; $i <= 14; $i++)
                            @php
                                $ipsField = 'ips' . $i;
                                $ipsValue = $mhs->$ipsField;
                                $color = $ipsValue < 2.0 ? 'red' : ($ipsValue < 2.5 ? 'yellow' : 'green');
                            @endphp
                            <td class="px-3 py-3 whitespace-nowrap text-center text-sm min-w-16">
                                @if($ipsValue > 0)
                                <span class="font-bold text-{{ $color }}-600 text-xs">
                                    {{ number_format($ipsValue, 2) }}
                                </span>
                                @else
                                <span class="text-gray-300 text-xs">-</span>
                                @endif
                            </td>
                            @endfor
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Info jumlah data -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="text-sm text-gray-600 text-center">
                    Menampilkan {{ $mahasiswaAktif->count() }} mahasiswa aktif
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Early Warning System - Teknik Informatika. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>