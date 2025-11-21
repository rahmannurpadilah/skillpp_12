<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        return view('admin.kategori.index', $data);
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'nama_kategori' => 'required'
        ]);

        Category::create($validasi);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');;
    }

    public function delete($id){
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
