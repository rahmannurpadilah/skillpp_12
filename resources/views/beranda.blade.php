@extends('template')

@section('title', 'Beranda')

@section('content')

{{-- HERO SECTION --}}
<section class="relative w-full h-[420px] md:h-[520px] overflow-hidden mt-28">

    <img src="{{ asset('assets/background.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/20"></div>

    <div class="relative container mx-auto px-5 h-full flex flex-col justify-center text-white">
        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight max-w-2xl">
            Belanja Produk Kreatif <br> Karya Siswa Terbaik
        </h1>

        <p class="mt-4 text-lg max-w-xl text-gray-200">
            Temukan beragam karya siswa dari berbagai jurusan—kreatif, inovatif, dan unik!
        </p>

        <div class="mt-6 flex gap-3">
            <a href="/produk"
               class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg text-lg shadow">
                Jelajahi Produk
            </a>

            <a href="/toko"
               class="px-6 py-3 bg-white/20 hover:bg-white/30 border border-white/40 text-white rounded-lg text-lg backdrop-blur-md">
                Lihat Toko
            </a>
        </div>
    </div>

</section>



{{-- PRODUK TERBARU --}}
<section class="container mx-auto px-5 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-800">Produk Terbaru</h2>
        <p class="text-gray-500 mt-2">Produk pilihan terbaru dari para siswa</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">
        @foreach ($produk as $item)
            @php
                $firstImage = $item->gambarProduk->first();
                $imgUrl = $firstImage
                    ? asset('image-product/' . $firstImage->nama_gambar)
                    : 'https://via.placeholder.com/400x300';
            @endphp

            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden">
                <img src="{{ $imgUrl }}" class="w-full h-48 object-cover">

                <div class="p-4">
                    <h5 class="font-bold text-gray-800 text-lg">{{ $item->nama_produk }}</h5>
                    <p class="text-red-600 font-bold mt-2 text-lg">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

                    <a href="/produk/{{ $item->id }}"
                       class="block mt-4 text-center px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>



{{-- PRODUK POPULER --}}
@if ($populer->count() > 0)
<section class="container mx-auto px-5 pb-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-800">Produk Populer</h2>
        <p class="text-gray-500 mt-2">Produk pilihan yang sering dilihat</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-7">
        @foreach ($populer as $item)
            @php
                $img = $item->gambarProduk->first()
                    ? asset('image-product/' . $item->gambarProduk->first()->nama_gambar)
                    : 'https://via.placeholder.com/400x300';
            @endphp

            <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">
                <img src="{{ $img }}" class="w-full h-40 object-cover">

                <div class="p-4">
                    <h5 class="font-bold text-gray-800 text-lg">{{ $item->nama_produk }}</h5>
                    <p class="text-red-600 font-bold">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif



{{-- KATEGORI PRODUK --}}
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-5">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Kategori Produk</h2>
            <p class="text-gray-600">Pilih kategori produk untuk mulai berbelanja</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach ($kategori as $cat)
                <a href="/produk?kategori={{ $cat->id }}"
                   class="group bg-white rounded-xl shadow hover:shadow-xl transition p-6 text-center block">

                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-red-500 to-red-400 text-white rounded-full flex items-center justify-center mb-4 group-hover:scale-105 transition">
                        <i class="bi bi-grid text-3xl"></i>
                    </div>

                    <h3 class="font-semibold text-gray-800 text-lg">
                        {{ $cat->nama_kategori }}
                    </h3>

                    <p class="text-gray-500 text-sm mt-1">
                        {{ $cat->produks_count }} produk
                    </p>
                </a>
            @endforeach
        </div>

    </div>
</section>



{{-- TOKO POPULER --}}
@if ($toko_populer->count() > 0)
<section class="container mx-auto px-5 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-800">Toko Populer</h2>
        <p class="text-gray-500 mt-2">Toko dengan jumlah produk terbanyak</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-7">
        @foreach ($toko_populer as $toko)
            <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-5 text-center">
                <img src="{{ $toko->gambar ? asset('storage/'.$toko->gambar) : '/no-image.png' }}"
                     class="w-24 h-24 object-cover rounded-full mx-auto">

                <h4 class="font-bold text-lg mt-4">{{ $toko->nama_toko }}</h4>

                <p class="text-gray-500 text-sm mt-1">
                    {{ $toko->produks_count }} produk
                </p>

                <a href="/toko/{{ $toko->id }}"
                    class="mt-3 inline-block px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-black transition text-sm">
                    Kunjungi Toko
                </a>
            </div>
        @endforeach
    </div>
</section>
@endif


@endsection
