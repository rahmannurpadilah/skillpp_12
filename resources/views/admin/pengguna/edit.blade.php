@extends('admin.template')

@section('title', 'Edit Pengguna')

@section('content')

<div class="max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">Edit Pengguna</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pengguna.update', $user->id) }}"
          method="POST"
          class="bg-white p-6 rounded-lg shadow border border-gray-200 space-y-5">

        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Nama</label>
            <input type="text"
                   name="nama"
                   value="{{ old('nama', $user->nama) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div>
            <label class="block font-medium mb-1">Kontak</label>
            <input type="text"
                   name="kontak"
                   value="{{ old('kontak', $user->kontak) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:ring-gray-700 focus:border-gray-700">
        </div>

        <div>
            <label class="block font-medium mb-1">Username</label>
            <input type="text"
                   name="username"
                   value="{{ old('username', $user->username) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:ring-gray-700 focus:border-gray-700"
                   required>
        </div>

        <div class="flex gap-3 pt-3">
            <button type="submit"
                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                Simpan
            </button>

            <a href="{{ route('admin.pengguna.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400 transition">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection
