@extends('admin.template')

@section('title', 'Edit Toko')

@section('content')

<div class="max-w-3xl mx-auto">

    {{-- Title --}}
    <h2 class="text-2xl font-bold mb-6">Edit Toko</h2>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('admin.toko.update', $toko->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow border border-gray-200 space-y-5">

        @csrf
        @method('PUT')

        {{-- Gambar Preview --}}
        <div>
            <label class="block font-medium mb-2">Preview Gambar Saat Ini</label>

            <div class="w-full max-w-xs rounded overflow-hidden border border-gray-300">
                <img
                    class="w-full object-cover rounded"
                    src="{{ $toko->gambar ? asset('storage/' . $toko->gambar) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                    onerror="this.onerror=null;this.src='https://via.placeholder.com/300x200?text=No+Image';">
            </div>
        </div>

        {{-- Nama Toko --}}
        <div>
            <label class="block font-medium mb-1">Nama Toko</label>
            <input type="text"
                   name="nama_toko"
                   value="{{ old('nama_toko', $toko->nama_toko) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700">{{ old('deskripsi', $toko->deskripsi) }}</textarea>
        </div>

        {{-- Ganti Gambar --}}
        <div>
            <label class="block font-medium mb-1">Ganti Gambar (opsional)</label>
            <input type="file" name="gambar"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white">

            <p class="text-sm text-gray-500 mt-1">
                Biarkan kosong jika tidak ingin mengubah gambar.
            </p>
        </div>

        {{-- Kontak --}}
        <div>
            <label class="block font-medium mb-1">Kontak Toko</label>
            <input type="text"
                   name="kontak_toko"
                   value="{{ old('kontak_toko', $toko->kontak_toko) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700">
        </div>

        {{-- Alamat --}}
        <div>
            <label class="block font-medium mb-1">Alamat</label>
            <textarea name="alamat" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700">{{ old('alamat', $toko->alamat) }}</textarea>
        </div>

        {{-- Hidden owner --}}
        <input type="hidden" name="id_user" value="{{ $toko->id_user }}">

        {{-- Buttons --}}
        <div class="flex gap-3 pt-3">
            <button type="submit"
                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                Simpan
            </button>

            <a href="{{ route('admin.toko.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 transition">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection
