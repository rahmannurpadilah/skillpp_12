@extends('admin.template')

@section('title', 'Daftar Pengguna')

@section('content')

<div class="max-w-full mx-auto">

    {{-- Header --}}
    <div class="mb-2">
        <h2 class="text-2xl font-bold">Daftar Pengguna</h2>
        <p class="text-sm text-gray-600">Kelola seluruh pengguna sistem</p>
    </div>

    <div class="bg-white rounded-lg shadow border border-gray-200 p-6 space-y-5">

        <div class="flex flex-col md:flex-row justify-between gap-4">

            <div class="relative flex-1 max-w-md">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari pengguna..."
                    class="w-full pl-4 pr-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-gray-800"
                    onkeyup="filterTable()"
                >
            </div>

            <a href="{{ route('admin.pengguna.create') }}"
               class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                + Tambah Pengguna
            </a>
        </div>

        @if(session('success'))
            <div class="p-3 bg-green-100 border border-green-300 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-lg border border-gray-200">
            <div class="overflow-x-auto">

                <table class="w-full text-sm" id="userTable">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">No</th>
                            <th class="px-6 py-3 text-left font-semibold">Nama</th>
                            <th class="px-6 py-3 text-left font-semibold">Kontak</th>
                            <th class="px-6 py-3 text-left font-semibold">Username</th>
                            <th class="px-6 py-3 text-left font-semibold">Role</th>
                            <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse ($users as $i => $user)
                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-3">{{ $i + 1 }}</td>

                                <td class="px-6 py-3 font-medium text-gray-800">
                                    {{ $user->nama }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $user->kontak }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $user->username }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ ucfirst($user->role) }}
                                </td>

                                <td class="px-6 py-3">
                                    <div class="flex justify-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.pengguna.edit', $user->id) }}"
                                           class="px-3 py-1 bg-yellow-400 text-black text-sm rounded hover:bg-yellow-500">
                                            Edit
                                        </a>

                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('admin.pengguna.destroy', $user->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="6" class="text-center px-6 py-6 text-gray-500">
                                    Belum ada pengguna.
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
    let rows = document.querySelectorAll("#userTable tbody tr");

    rows.forEach(row => {
        let name = row.cells[1].innerText.toLowerCase();
        let username = row.cells[3].innerText.toLowerCase();
        row.style.display =
            name.includes(input) || username.includes(input)
            ? ""
            : "none";
    });
}
</script>

@endsection
