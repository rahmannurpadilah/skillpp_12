@extends('admin.template')

@section('title', 'Tambah Pengguna')

@section('content')

<div class="max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">Tambah Pengguna Baru</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.pengguna.store') }}"
          method="POST"
          class="bg-white p-6 rounded-lg shadow border border-gray-200 space-y-5">

        @csrf

        <div>
            <label class="block font-medium mb-1">Nama</label>
            <input type="text"
                   name="nama"
                   value="{{ old('nama') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div>
            <label class="block font-medium mb-1">Kontak</label>
            <input type="text"
                   name="kontak"
                   value="{{ old('kontak') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:ring-gray-700 focus:border-gray-700">
        </div>

        <div>
            <label class="block font-medium mb-1">Username</label>
            <input type="text"
                   name="username"
                   value="{{ old('username') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div>
            <label class="block font-medium mb-1">Kata Sandi</label>
            <input type="password"
                   name="password"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div class="flex gap-3 pt-3">
            <a href="{{ route('admin.pengguna.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 transition">
                Kembali
            </a>

            <button type="submit"
                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                Simpan
            </button>
        </div>

    </form>

</div>

@endsection
