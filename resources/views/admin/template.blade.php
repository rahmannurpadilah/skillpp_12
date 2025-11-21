<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen">

    <aside class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 flex flex-col">

        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-gray-900 flex items-center justify-center">
                    <i data-lucide="layout-dashboard" class="text-white w-5 h-5"></i>
                </div>
                <span class="text-lg font-bold text-gray-900">Admin Panel</span>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4">

            <a href="{{ url('/admin') }}"
               class="flex items-center gap-3 px-4 py-3 mx-2 mb-1 rounded-lg
               {{ request()->is('admin') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ url('/admin/toko') }}"
               class="flex items-center gap-3 px-4 py-3 mx-2 mb-1 rounded-lg
               {{ request()->is('admin/toko*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i data-lucide="store" class="w-5 h-5"></i>
                <span class="font-medium">Toko</span>
            </a>

            <a href="{{ url('/admin/kategori') }}"
               class="flex items-center gap-3 px-4 py-3 mx-2 mb-1 rounded-lg
               {{ request()->is('admin/kategori*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i data-lucide="package" class="w-5 h-5"></i>
                <span class="font-medium">Kategori</span>
            </a>

            <a href="{{ url('/admin/pengguna') }}"
               class="flex items-center gap-3 px-4 py-3 mx-2 mb-1 rounded-lg
               {{ request()->is('admin/pengguna*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span class="font-medium">Pengguna</span>
            </a>

            <a href="{{ url('/admin/produk') }}"
               class="flex items-center gap-3 px-4 py-3 mx-2 mb-1 rounded-lg
               {{ request()->is('admin/produk*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i data-lucide="package" class="w-5 h-5"></i>
                <span class="font-medium">Produk</span>
            </a>


        </nav>

        <div class="p-4 border-t border-gray-200">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-100">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>

    </aside>

    <header class="fixed top-0 left-64 right-0 h-16 bg-white border-b border-gray-200 px-6 flex items-center justify-between">

        <div>
            <h1 class="text-xl font-semibold">@yield('title')</h1>
            <p class="text-xs text-gray-500">Manage your application</p>
        </div>

        <div class="text-right">
            <div class="text-sm font-semibold">{{ Auth::user()->nama }}</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->role }}</div>
        </div>

    </header>

    <main class="ml-64 pt-24 pb-10 px-6">
        @yield('content')
    </main>

    <footer class="ml-64 pb-6 text-center text-gray-500 text-sm">

        @hasSection('footer-info')
            <p class="mb-1">@yield('footer-info')</p>
        @endif

        © {{ date('Y') }} Admin E-Commerce School
    </footer>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
