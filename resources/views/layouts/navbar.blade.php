<nav class="bg-blue-600 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo/Brand -->
            <a href="{{ url('/') }}" class="text-xl font-bold">Early Warning System</a>
            
            <!-- Navigation Links -->
            <div class="flex items-center space-x-6">
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-200 transition">Dashboard</a>
                    
                    <!-- Role-based links -->
                    @if(Auth::user()->role === 'mahasiswa')
                        <a href="#" class="hover:text-blue-200 transition">Early Warning</a>
                        <a href="#" class="hover:text-blue-200 transition">Progress</a>
                    @elseif(Auth::user()->role === 'dosen')
                        <a href="#" class="hover:text-blue-200 transition">Monitoring</a>
                        <a href="#" class="hover:text-blue-200 transition">Mahasiswa</a>
                    @elseif(Auth::user()->role === 'admin')
                        <a href="#" class="hover:text-blue-200 transition">Users</a>
                        <a href="#" class="hover:text-blue-200 transition">Reports</a>
                    @endif

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <span class="text-sm">Halo, {{ Auth::user()->name }}</span>
                        <span class="bg-blue-500 px-2 py-1 rounded text-sm capitalize">
                            {{ Auth::user()->role }}
                        </span>
                        
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm transition">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Guest Links -->
                    <a href="{{ route('login') }}" class="hover:text-blue-200 transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 rounded transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>