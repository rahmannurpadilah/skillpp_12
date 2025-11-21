<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School-shop')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800">

    <header class="w-full bg-white/80 backdrop-blur-md shadow-sm fixed top-0 z-50">

        <div class="container mx-auto px-6 py-4 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <i class="bi bi-shop text-2xl text-gray-800"></i>
                <span class="text-2xl font-bold text-gray-900">School-Store</span>
            </a>

            {{-- Search --}}
            <form method="GET" action="{{ route('produk.all') }}"
                class="hidden md:flex flex-1 mx-10">
                <div class="flex w-full bg-white rounded-full shadow-sm overflow-hidden border">
                    <input type="search" name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari produk kreatif siswa..."
                        class="px-5 py-2 w-full focus:outline-none text-gray-700">
                    <button class="px-6 bg-gray-800 text-white hover:bg-black">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            {{-- Login --}}
            <a href="{{ route('login') }}"
            class="hidden md:inline-block px-6 py-2 rounded-full bg-gray-900 text-white hover:bg-black transition">
                Login
            </a>

            {{-- Mobile menu --}}
            <button class="md:hidden text-3xl text-gray-800" onclick="toggleMenu()">
                <i class="bi bi-list"></i>
            </button>

        </div>

        {{-- Nav Menu --}}
        <nav class="hidden md:flex justify-center bg-white border-t border-gray-200">
            <ul class="flex items-center space-x-10 py-3 font-medium text-gray-700">
                <li><a href="{{ route('home') }}" class="hover:text-gray-900">Beranda</a></li>
                <li><a href="{{ route('produk.all') }}" class="hover:text-gray-900">Produk</a></li>
                <li><a href="{{ route('toko.public') }}" class="hover:text-gray-900">Toko</a></li>
            </ul>
        </nav>

    </header>



    <main class="flex-grow container mx-auto px-4 py-6 mt-">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-300 mt-20 pt-16 pb-10">

        <div class="container mx-auto px-6 flex md:grid-cols-4 gap-10 justify-around">

            <div>
                <h3 class="text-lg font-bold text-white mb-3">School-Store</h3>
                <p class="text-sm opacity-80">Marketplace resmi untuk karya kreatif siswa sekolah.</p>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-3">Menu</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-white">Beranda</a></li>
                    <li><a href="/produk" class="hover:text-white">Produk</a></li>
                    <li><a href="/toko" class="hover:text-white">Toko</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-3">Ikuti Kami</h4>
                <div class="flex space-x-4 text-2xl">
                    <a href="#" class="hover:text-white"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="hover:text-white"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="hover:text-white"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

        </div>

        <p class="text-center text-sm text-gray-400 mt-10">
            © {{ date('Y') }} School-Store. All Rights Reserved.
        </p>

    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }
    </script>

</body>
</html>
