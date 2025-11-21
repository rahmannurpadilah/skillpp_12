@extends('admin.template')

@section('title', 'Tambah Toko')

@section('content')

<div class="max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">Tambah Toko</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.toko.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow border border-gray-200 space-y-5">

        @csrf

        <div>
            <label class="block font-medium mb-1">Nama Toko</label>
            <input type="text" name="nama_toko" value="{{ old('nama_toko') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700"
                   maxlength="100" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700"
                required>{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Gambar (Opsional)</label>
            <input type="file" name="gambar"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white">
        </div>

        <div>
            <label class="block font-medium mb-1">Pemilik (User)</label>
            <select name="id_user" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-gray-700 focus:border-gray-700">
                <option value="">-- Pilih Pemilik --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @selected(old('id_user') == $user->id)>
                        {{ $user->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Kontak Toko</label>
            <input type="text" name="kontak_toko" value="{{ old('kontak_toko') }}"
                   maxlength="13" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700">
        </div>

        <div>
            <label class="block font-medium mb-1">Alamat</label>
            <textarea name="alamat" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-gray-700 focus:border-gray-700"
                required>{{ old('alamat') }}</textarea>
        </div>

        <div class="flex gap-3 pt-3">
            <a href="{{ route('admin.toko.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 transition">
                Batal
            </a>

            <button type="submit"
                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                Simpan
            </button>
        </div>

    </form>

</div>

@endsection
