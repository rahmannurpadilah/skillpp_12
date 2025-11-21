@extends('template')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">

    <div class="container mx-auto px-5">

        <!-- Header Section -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Daftar Toko</h1>
            <p class="text-gray-600 text-lg">Temukan berbagai toko pilihan dengan produk berkualitas</p>
        </div>

        <!-- Stores Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            @foreach ($stores as $store)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 group">

                    <div class="p-6">
                        <div class="flex items-start gap-5">

                            <!-- Store Image -->
                            <div class="flex-shrink-0 relative">
                                @if ($store->gambar)
                                    <img src="{{ asset('storage/' . $store->gambar) }}"
                                        class="w-24 h-24 rounded-2xl object-cover shadow-lg ring-2 ring-gray-100 group-hover:ring-gray-300 transition-all duration-300">
                                @else
                                    <img src="/no-image.png"
                                        class="w-24 h-24 rounded-2xl object-cover shadow-lg ring-2 ring-gray-100 group-hover:ring-gray-300 transition-all duration-300">
                                @endif

                                <!-- Badge Produk Count (Optional) -->
                                <div class="absolute -top-2 -right-2 bg-gray-900 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg">
                                    {{ $store->produks->count() }} Produk
                                </div>
                            </div>

                            <!-- Store Info -->
                            <div class="flex-grow min-w-0">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2 truncate group-hover:text-gray-700 transition-colors">
                                    {{ $store->nama_toko }}
                                </h3>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ Str::limit($store->deskripsi, 100) }}
                                </p>

                                <!-- Store Details -->
                                <div class="space-y-2 mb-4">
                                    @if($store->alamat)
                                        <div class="flex items-center gap-2 text-sm text-gray-500">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="truncate">{{ Str::limit($store->alamat, 50) }}</span>
                                        </div>
                                    @endif

                                    @if($store->kontak_toko)
                                        <div class="flex items-center gap-2 text-sm text-gray-500">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                            <span>{{ $store->kontak_toko }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Button -->
                                <a href="{{ route('toko.detail', $store->id) }}"
                                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800 active:scale-95 transition-all duration-200 shadow-lg hover:shadow-xl group-hover:gap-3">
                                    <span>Kunjungi Toko</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- Bottom Accent -->
                    <div class="h-1 bg-gradient-to-r from-gray-800 to-gray-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                </div>
            @endforeach

        </div>

        <!-- Empty State -->
        @if($stores->count() == 0)
            <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Toko</h3>
                <p class="text-gray-500">Tidak ada toko yang terdaftar saat ini</p>
            </div>
        @endif

    </div>

</div>

@endsection
