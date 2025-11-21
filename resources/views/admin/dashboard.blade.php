@extends('admin.template')
@section('title', 'Dashboard Admin')
@section('menu-dashboard', 'bg-gray-100 text-black')

@section('content')

<div class="text-center mb-10">
    <h3 class="text-2xl font-bold text-gray-800">
        Selamat Datang, {{ Auth::user()->nama }}
    </h3>
    <p class="text-gray-500 mt-1">
        Gunakan menu navigasi di samping untuk mengelola data sesuai hak akses Anda.
    </p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @if (Auth::user()->role === 'admin')

        <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 text-center hover:shadow-lg transition">
            <h5 class="text-gray-700 font-semibold">Total Toko</h5>
            <h2 class="text-4xl font-bold text-gray-900 my-2">{{ $totalToko ?? 0 }}</h2>
            <a href="{{ url('/admin/toko') }}"
               class="inline-block mt-3 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                Lihat Data
            </a>
        </div>

        <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 text-center hover:shadow-lg transition">
            <h5 class="text-gray-700 font-semibold">Total Pengguna</h5>
            <h2 class="text-4xl font-bold text-gray-900 my-2">{{ $totalPengguna ?? 0 }}</h2>
            <a href="{{ url('/admin/pengguna') }}"
               class="inline-block mt-3 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                Lihat Data
            </a>
        </div>

        <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 text-center hover:shadow-lg transition">
            <h5 class="text-gray-700 font-semibold">Total Produk</h5>
            <h2 class="text-4xl font-bold text-gray-900 my-2">{{ $totalProdukAll ?? 0 }}</h2>
            <a href="{{ url('/admin/produk') }}"
               class="inline-block mt-3 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                Lihat Data
            </a>
        </div>

    @endif



    @if (Auth::user()->role === 'member')

        <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 text-center hover:shadow-lg transition">
            <h5 class="text-gray-700 font-semibold">Total Produk Saya</h5>
            <h2 class="text-4xl font-bold text-gray-900 my-2">{{ $totalProduk ?? 0 }}</h2>
            <a href="{{ url('/member/produk') }}"
               class="inline-block mt-3 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                Lihat Data
            </a>
        </div>

        <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 text-center hover:shadow-lg transition">
            <h5 class="text-gray-700 font-semibold">Total Kategori</h5>
            <h2 class="text-4xl font-bold text-gray-900 my-2">{{ $totalKategori ?? 0 }}</h2>
            <a href="{{ url('/member/kategori') }}"
               class="inline-block mt-3 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                Lihat Data
            </a>
        </div>

    @endif

</div>

@endsection


@section('footer-info')
    {{-- <strong>Official E-Commerce SMAN 1 Bandung</strong> --}}
@endsection
