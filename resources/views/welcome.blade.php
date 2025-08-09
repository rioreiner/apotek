<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R-Apotek - Sistem Manajemen Obat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Arial', sans-serif; }
        .hero-bg {
            background-image: url('hero-bg.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.5); /* Overlay gelap agar teks terbaca */
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Navbar -->
<nav class="bg-white shadow-md border-b sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-tr from-blue-500 to-blue-300 rounded-xl flex items-center justify-center shadow">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <span class="text-xl md:text-2xl font-bold text-blue-600 tracking-tight">R-Apotek</span>
            </div>
            <!-- Menu desktop -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="/login" class="px-4 py-2 rounded-lg text-blue-600 font-bold hover:bg-blue-50 transition">Masuk</a>
                <a href="/register" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-bold shadow transition">Daftar</a>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="nav-toggle" class="p-2 rounded-md hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="nav-menu" class="hidden md:hidden flex-col space-y-2 mt-2 pb-4">
            <a href="/login" class="block px-4 py-2 text-blue-600 hover:bg-blue-50 rounded">Masuk</a>
            <a href="/register" class="block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Daftar</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-bg relative py-20 sm:py-28 flex items-center">
    <div class="relative max-w-6xl mx-auto text-center text-white px-4 z-10">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6">Sistem Apotek <span class="text-blue-400">Modern</span></h1>
        <p class="text-lg sm:text-xl mb-8 max-w-2xl mx-auto">Kelola inventori obat dengan mudah dan efisien. Solusi digital untuk apotek masa kini.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/register" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium">Mulai Sekarang</a>
            <a href="#fitur" class="border border-white hover:border-blue-500 text-white hover:text-blue-500 px-6 py-3 rounded-lg font-medium">Pelajari Fitur</a>
        </div>
    </div>
</section>

<!-- Features Section -->
    <section id="fitur" class="py-20">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Fitur Utama</h2>
                <p class="text-gray-600">Semua yang Anda butuhkan untuk mengelola apotek</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Manajemen Inventori</h3>
                    <p class="text-gray-600">Kelola stok obat dengan mudah, pantau ketersediaan real-time</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Multi-Role Access</h3>
                    <p class="text-gray-600">Sistem role untuk admin dan user dengan kontrol akses yang aman</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Dashboard Analytics</h3>
                    <p class="text-gray-600">Dashboard dengan statistik dan insight untuk performa apotek</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Monitoring Kadaluarsa</h3>
                    <p class="text-gray-600">Peringatan otomatis untuk obat yang akan atau sudah kadaluarsa</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Pencarian Cepat</h3>
                    <p class="text-gray-600">Temukan obat dengan cepat menggunakan fitur pencarian canggih</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Keamanan Terjamin</h3>
                    <p class="text-gray-600">Sistem keamanan berlapis dengan enkripsi data yang aman</p>
                </div>
            </div>
        </div>
    </section>
    
<!-- Footer -->
<footer class="bg-gray-900 text-white py-10 px-4">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <h3 class="text-xl font-bold mb-4">R-Apotek</h3>
            <p class="text-gray-400">Solusi manajemen apotek modern yang membantu mengelola inventori dengan efisien.</p>
        </div>
        <div>
            <h3 class="text-lg font-semibold mb-4">Menu</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="#" class="hover:text-white">Beranda</a></li>
                <li><a href="#fitur" class="hover:text-white">Fitur</a></li>
                <li><a href="/login" class="hover:text-white">Login</a></li>
                <li><a href="/register" class="hover:text-white">Daftar</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-semibold mb-4">Kontak</h3>
            <p class="text-gray-400">Maluku, Indonesia</p>
            <p class="text-gray-400">reinnlamer@gmail.com</p>
            <p class="text-gray-400">+62 822-3972-6125</p>
        </div>
    </div>
    <div class="mt-8 text-center text-gray-500">&copy; 2025 R-Apotek. All rights reserved.</div>
</footer>

<!-- Script toggle mobile menu -->
<script>
    document.getElementById('nav-toggle').onclick = function() {
        document.getElementById('nav-menu').classList.toggle('hidden');
    };
</script>

</body>
</html>