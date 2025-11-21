@extends('admin.template')

@section('title', 'Daftar Toko')

@section('content')

<div class="max-w-full mx-auto">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Toko</h2>

        <a href="{{ route('admin.toko.create') }}"
           class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
            + Tambah Toko
        </a>
    </div>

    {{-- Flash Success --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">

        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 font-semibold">No</th>
                    <th class="px-4 py-3 font-semibold">Nama Toko</th>
                    <th class="px-4 py-3 font-semibold">Deskripsi</th>
                    <th class="px-4 py-3 font-semibold">Kontak</th>
                    <th class="px-4 py-3 font-semibold">Alamat</th>
                    <th class="px-4 py-3 font-semibold">Pemilik</th>
                    <th class="px-4 py-3 font-semibold">Tanggal Dibuat</th>
                    <th class="px-4 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($stores as $i => $store)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-3">{{ $i + 1 }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $store->nama_toko }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $store->deskripsi }}</td>
                        <td class="px-4 py-3">{{ $store->kontak_toko }}</td>
                        <td class="px-4 py-3">{{ $store->alamat }}</td>
                        <td class="px-4 py-3">{{ $store->user->nama ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $store->created_at->format('d M Y') }}</td>

                        <td class="px-4 py-3 flex gap-2">

                            {{-- Edit --}}
                            <a href="{{ route('admin.toko.edit', $store->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-black text-sm rounded hover:bg-yellow-500">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.toko.destroy', $store->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus toko ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center px-4 py-5 text-gray-500">
                            Belum ada toko.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
