<nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="h-8 w-8 text-blue-600" />
                    <span class="ml-2 text-xl font-bold text-gray-900">R-Apotek</span>
                </a>
            </div>
            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('dashboard') ? 'border-b-2 border-blue-600' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('medicines.index') }}" class="text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('medicines.*') ? 'border-b-2 border-blue-600' : '' }}">
                    Obat
                </a>
            </div>
            <!-- User Dropdown -->
            <div class="flex items-center space-x-4">
                <span class="hidden md:inline text-gray-600 font-medium">
                    {{ Auth::user()->name }} <span class="text-xs text-gray-400">({{ Auth::user()->role }})</span>
                </span>
                <div class="relative group">
                    <button class="flex items-center focus:outline-none">
                        <svg class="w-6 h-6 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-500 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden flex-col space-y-2 py-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Dashboard</a>
            <a href="{{ route('medicines.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Obat</a>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-50">Log Out</button>
            </form>
        </div>
    </div>
    <script>
        // Simple mobile menu toggle
        document.getElementById('mobile-menu-btn').onclick = function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        };
    </script>
</nav>