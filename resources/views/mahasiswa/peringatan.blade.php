<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peringatan - {{ $mahasiswa->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-yellow-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Peringatan Akademik</h1>
            <a href="/mahasiswa" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4 text-yellow-600">⚠️ Peringatan untuk {{ $mahasiswa->nama }}</h2>
            
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <p class="text-yellow-800"><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                <p class="text-yellow-800"><strong>Email:</strong> {{ $mahasiswa->email }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-red-50 p-4 rounded-lg border border-red-200">
                    <h3 class="font-bold text-lg text-red-800 mb-2">Status Akademik</h3>
                    <p class="text-red-600">Perlu perhatian khusus</p>
                </div>
                
                <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                    <h3 class="font-bold text-lg text-orange-800 mb-2">Rekomendasi</h3>
                    <p class="text-orange-600">Konsultasi dengan dosen wali</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>