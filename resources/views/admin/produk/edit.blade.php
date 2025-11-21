@extends('admin.template')

@section('title', 'Edit Produk')

@section('content')

<div class="max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">Edit Produk</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('member.produk.update', $produk->id) }}"
          method="POST"
          class="bg-white p-6 rounded-lg shadow border border-gray-200 space-y-5">

        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Nama Produk</label>
            <input type="text"
                   name="nama_produk"
                   value="{{ old('nama_produk', $produk->nama_produk) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div>
            <label class="block font-medium mb-1">Harga</label>
            <input type="number"
                   name="harga"
                   value="{{ old('harga', $produk->harga) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div>
            <label class="block font-medium mb-1">Stok</label>
            <input type="number"
                   name="stok"
                   value="{{ old('stok', $produk->stok) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                      rows="4"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Tanggal Upload</label>
            <input type="date"
                   name="tanggal_upload"
                   value="{{ old('tanggal_upload', $produk->tanggal_upload) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700">
        </div>

        <div>
            <label class="block font-medium mb-1">Kategori</label>
            <select name="id_kategori"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700">
                @foreach($categories as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ $produk->id_kategori == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3 pt-3">
            <button type="submit"
                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                Simpan
            </button>

            <a href="{{ route('member.produk.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 transition">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection
