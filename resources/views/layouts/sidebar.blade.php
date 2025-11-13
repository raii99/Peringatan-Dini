<!-- Sidebar untuk Admin/Dosen -->
<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4">
        <h2 class="text-xl font-bold">Navigation</h2>
    </div>
    
    <nav class="mt-6">
        <div class="px-4 py-2 text-gray-400 text-sm font-semibold">MAIN</div>
        
        @if(Auth::user()->role === 'admin')
            <a href="#" class="block px-4 py-2 hover:bg-gray-700 {{ request()->is('admin*') ? 'bg-gray-700' : '' }}">
                Dashboard Admin
            </a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Kelola User
            </a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Laporan Sistem
            </a>
        @elseif(Auth::user()->role === 'dosen')
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Monitoring Mahasiswa
            </a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Early Warning
            </a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Konseling
            </a>
        @elseif(Auth::user()->role === 'mahasiswa')
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Dashboard Saya
            </a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Early Warning
            </a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-700">
                Progress Akademik
            </a>
        @endif
        
        <div class="px-4 py-2 text-gray-400 text-sm font-semibold mt-6">AKUN</div>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-700 text-red-400">
                Logout
            </button>
        </form>
    </nav>
</aside>