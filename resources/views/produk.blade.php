@extends('template')

@section('title', 'Semua Produk')

@section('content')

<div class="container mx-auto px-5 py-8">

    @if(request('search'))
        <h2 class="text-3xl font-bold text-center">
            Hasil pencarian untuk:
            <span class="text-gray-800">"{{ request('search') }}"</span>
        </h2>
        <p class="text-center text-gray-500 mb-8">
            {{ $products->count() }} produk ditemukan
        </p>
    @else
        <h2 class="text-3xl font-bold text-center mb-8">Semua Produk</h2>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">

        @forelse ($products as $item)

            @php
                $image = $item->gambarProduk->first()->nama_gambar ?? null;
            @endphp

            <div class="bg-white shadow-sm rounded-xl overflow-hidden hover:shadow-lg transition">

                <img
                    src="{{ $image ? asset('image-product/' . $image) : 'https://via.placeholder.com/400x280?text=No+Image' }}"
                    class="w-full h-48 object-cover">

                <div class="p-4">
                    <h5 class="font-bold text-lg text-gray-800 mb-1">
                        {{ $item->nama_produk }}
                    </h5>

                    <p class="text-gray-700 font-semibold mb-1">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <p class="text-gray-500 text-sm">
                        {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                    </p>

                    <p class="text-gray-400 text-sm mt-1">
                        Toko: {{ $item->toko->nama_toko ?? '-' }}
                    </p>

                    <a href="{{ route('produk.detail', $item->id) }}"
                       class="block mt-4 w-full text-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                        Detail Produk
                    </a>
                </div>

            </div>

        @empty

            @if(request('search'))
                <div class="col-span-4 text-center py-10">
                    <p class="text-gray-600">Produk tidak ditemukan untuk "<strong>{{ request('search') }}</strong>"</p>
                </div>
            @else
                <div class="col-span-4 text-center py-10">
                    <p class="text-gray-600">Belum ada produk tersedia.</p>
                </div>
            @endif

        @endforelse

    </div>

</div>

@endsection
