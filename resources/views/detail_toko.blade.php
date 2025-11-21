@extends('template')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">

    <div class="container mx-auto px-5">

        <!-- Store Header Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-12">

            <div class="px-8 py-10">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-6">

                    <!-- Store Image -->
                    <img src="{{ $store->gambar ? asset('storage/'.$store->gambar) : '/no-image.png' }}"
                         class="w-32 h-32 rounded-2xl object-cover shadow-lg ring-2 ring-gray-200">

                    <!-- Store Info -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-4xl font-bold text-gray-900 mb-3">{{ $store->nama_toko }}</h1>
                        <p class="text-gray-600 text-lg max-w-2xl mb-6">
                            {{ $store->deskripsi }}
                        </p>

                        <!-- Contact Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                            <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl">
                                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Alamat</p>
                                    <p class="text-gray-800 font-semibold">{{ $store->alamat }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl">
                                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Kontak</p>
                                    <p class="text-gray-800 font-semibold">{{ $store->kontak_toko }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Koleksi Produk</h2>
            <p class="text-gray-600">Jelajahi produk pilihan dari toko kami</p>
        </div>

        @if ($store->produks->count() == 0)
            <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-500">Toko ini belum menambahkan produk apapun</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @foreach ($store->produks as $produk)

                    @php
                        $img = $produk->images->count() > 0
                            ? asset('image-product/' . $produk->images->first()->nama_gambar)
                            : '/no-image.png';
                    @endphp

                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group">

                        <div class="relative overflow-hidden">
                            <img src="{{ $img }}"
                                 class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <div class="p-5">

                            <h3 class="font-bold text-gray-900 text-xl mb-2 line-clamp-1">
                                {{ $produk->nama_produk }}
                            </h3>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ Str::limit($produk->deskripsi, 60) }}
                            </p>

                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Harga</p>
                                    <p class="text-2xl font-bold text-gray-900">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>

                            <a href="{{ route('produk.detail', $produk->id) }}"
                               class="block text-center w-full px-4 py-3 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800 active:scale-95 transition-all duration-200 shadow-lg hover:shadow-xl">
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>
        @endif

    </div>

</div>

@endsection
