@extends('admin.template')

@section('title', 'Kategori Produk')

@section('content')

<div class="max-w-full mx-auto">

    {{-- Header --}}
    <div class="mb-2">
        <h2 class="text-2xl font-bold">Kategori Produk</h2>
        <p class="text-sm text-gray-600">Kelola kategori produk untuk toko Anda</p>
    </div>

    {{-- CARD WRAPPER --}}
    <div class="bg-white rounded-lg shadow border border-gray-200 p-6 space-y-5">

        {{-- SEARCH + INPUT TAMBAH --}}
        <div class="flex flex-col md:flex-row justify-between gap-4">

            {{-- Search Bar --}}
            <div class="relative flex-1 max-w-md">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari kategori..."
                    class="w-full pl-4 pr-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-gray-800"
                    onkeyup="filterTable()"
                >
            </div>

            {{-- Form Tambah --}}
            <form action="{{ route('admin.kategori.store') }}" method="POST" class="flex gap-2">
                @csrf
                <input
                    type="text"
                    name="nama_kategori"
                    placeholder="Tambah kategori baru"
                    required
                    class="px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-gray-800 w-72"
               >

                <button
                    type="submit"
                    class="flex items-center gap-2 bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-black transition"
                >
                    + Tambah
                </button>
            </form>

        </div>

        {{-- Table --}}
        <div class="overflow-hidden rounded-lg border border-gray-200">
            <div class="overflow-x-auto">

                <table class="w-full text-sm" id="kategoriTable">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">No</th>
                            <th class="px-6 py-3 text-left font-semibold">Nama Kategori</th>
                            <th class="px-6 py-3 text-left font-semibold">Tanggal Dibuat</th>
                            <th class="px-6 py-3 text-left font-semibold">Update</th>
                            <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($categories as $i => $kategori)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $i + 1 }}</td>

                                <td class="px-6 py-3 font-medium text-gray-800">
                                    {{ $kategori->nama_kategori }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $kategori->created_at?->format('d M Y') ?? '-' }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $kategori->updated_at?->format('d M Y') ?? '-' }}
                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-3 flex gap-2">

                                    {{-- BUTTON EDIT --}}
                                    <button
                                        onclick="openEditModal({{ $kategori->id }}, '{{ $kategori->nama_kategori }}')"
                                        class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                        Edit
                                    </button>

                                    {{-- BUTTON DELETE --}}
                                    <form action="{{ route('admin.kategori.destroy', $kategori->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center px-6 py-6 text-gray-500">
                                    Belum ada kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>
        </div>

    </div>

</div>

{{-- Script Search --}}
<script>
function filterTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let rows = document.querySelectorAll("#kategoriTable tbody tr");

    rows.forEach(row => {
        let name = row.cells[1].innerText.toLowerCase();
        row.style.display = name.includes(input) ? "" : "none";
    });
}
</script>

@endsection
