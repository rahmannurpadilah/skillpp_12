@extends('template')

@section('title', 'Detail Produk')

@section('content')

<div class="container mx-auto px-5 py-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <div>
            @if ($produk->gambarProduk->count() > 0)
                <img src="{{ asset('image-product/' . $produk->gambarProduk->first()->nama_gambar) }}"
                     class="w-full rounded-xl shadow-md object-cover">
            @else
                <img src="https://via.placeholder.com/400x300?text=No+Image"
                     class="w-full rounded-xl shadow-md object-cover">
            @endif
        </div>

        <div>

            <h2 class="text-3xl font-bold text-gray-900 mb-3">
                {{ $produk->nama_produk }}
            </h2>

            <h4 class="text-2xl font-semibold text-gray-700 mb-2">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </h4>

            <p class="text-gray-500 mb-1">
                <span class="font-semibold text-gray-700">Kategori:</span>
                {{ $produk->kategori->nama_kategori ?? '-' }}
            </p>

            <p class="text-gray-500">
                <span class="font-semibold text-gray-700">Toko:</span>
                {{ $produk->toko->nama_toko ?? '-' }}
            </p>

            <p class="mt-5 text-gray-700 leading-relaxed">
                {{ $produk->deskripsi }}
            </p>


            <div class="mt-6 flex gap-4">

                <a href="https://wa.me/{{ $produk->toko->kontak_toko }}?text=ApaIniMasihAda?"
                   class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow">
                    Order via WhatsApp
                </a>

                <a href="{{ route('produk.all') }}"
                   class="px-6 py-3 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition shadow">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
