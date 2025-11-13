<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip Nilai - {{ $mahasiswa->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-2xl font-bold text-center mb-4">TRANSKRIP NILAI</h1>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
                    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                </div>
                <div>
                    <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
                    <p><strong>IPK:</strong> {{ $ipk }}</p>
                </div>
            </div>
        </div>

        <!-- Ringkasan IPS -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Ringkasan IPS</h2>
            <div class="grid grid-cols-7 gap-2">
                @for($i = 1; $i <= 7; $i++)
                    <div class="text-center p-2 bg-blue-50 rounded">
                        <div class="font-semibold">Semester {{ $i }}</div>
                        <div class="text-lg font-bold">{{ $ips[$i] ?? '0.00' }}</div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Tabel Mata Kuliah -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold mb-4">Detail Mata Kuliah</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Kode MK</th>
                            <th class="px-4 py-2">Mata Kuliah</th>
                            <th class="px-4 py-2">SMT</th>
                            <th class="px-4 py-2">SKS</th>
                            <th class="px-4 py-2">Nilai</th>
                            <th class="px-4 py-2">Huruf</th>
                            <th class="px-4 py-2">Bobot</th>
                            <th class="px-4 py-2">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transkrip as $index => $mk)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $mk->kode_mk }}</td>
                            <td class="px-4 py-2">{{ $mk->nama_mk }}</td>
                            <td class="px-4 py-2 text-center">{{ $mk->semester }}</td>
                            <td class="px-4 py-2 text-center">{{ $mk->sks }}</td>
                            <td class="px-4 py-2 text-center">{{ number_format($mk->nilai, 2) }}</td>
                            <td class="px-4 py-2 text-center">{{ $mk->huruf }}</td>
                            <td class="px-4 py-2 text-center">{{ $mk->bobot }}</td>
                            <td class="px-4 py-2 text-center">{{ $mk->jumlah }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-6">
            <a href="{{ route('mahasiswa.index') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Kembali ke Daftar Mahasiswa
            </a>
        </div>
    </div>
</body>
</html>