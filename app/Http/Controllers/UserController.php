<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'kontak'   => 'nullable|string|max:100',
            'username' => 'required|string|max:100|unique:user,username',
            'password' => 'required|min:6',
        ]);

        User::create([
            'nama'     => $request->nama,
            'kontak'   => $request->kontak,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.pengguna.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.edit', compact('user'));
    }

    // Update data pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama'     => 'required|string|max:100',
            'kontak'   => 'nullable|string|max:100',
            'username' => 'required|string|max:100|unique:user,username,' . $user->id . ',id',
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'nama'     => $request->nama,
            'kontak'   => $request->kontak,
            'username' => $request->username,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.pengguna.index')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    // Hapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
