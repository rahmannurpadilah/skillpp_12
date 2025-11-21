@extends('admin.template')

@section('title', 'Daftar Produk')

@section('content')

<div class="max-w-full mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Produk</h2>

        @if (Auth::user()->role === 'member')
            <a href="{{ route('member.produk.create') }}"
                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                + Tambah Produk
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">

        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 font-semibold">No</th>
                    <th class="px-4 py-3 font-semibold">Nama Produk</th>
                    <th class="px-4 py-3 font-semibold">Harga</th>
                    <th class="px-4 py-3 font-semibold">Stok</th>
                    <th class="px-4 py-3 font-semibold">Kategori</th>
                    <th class="px-4 py-3 font-semibold">Toko</th>
                    <th class="px-4 py-3 font-semibold">Tanggal Upload</th>
                    <th class="px-4 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $i => $product)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-3">{{ $i + 1 }}</td>

                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $product->nama_produk }}
                        </td>

                        <td class="px-4 py-3">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </td>

                        <td class="px-4 py-3">{{ $product->stok }}</td>

                        <td class="px-4 py-3">
                            {{ $product->category->nama_kategori ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $product->store->nama_toko ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $product->tanggal_upload }}
                        </td>

                        <td class="px-4 py-3 flex gap-2">

                            @if (Auth::user()->role === 'member')
                                <a href="{{ route('member.produk.edit', $product->id) }}"
                                    class="px-3 py-1 bg-yellow-400 text-black text-sm rounded hover:bg-yellow-500">
                                    Edit
                                </a>
                            @endif

                            <form
                                action="{{ Auth::user()->role === 'member'
                                    ? route('member.produk.destroy', $product->id)
                                    : route('admin.produk.destroy', $product->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="8"
                            class="text-center px-4 py-5 text-gray-500">
                            Belum ada produk.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
