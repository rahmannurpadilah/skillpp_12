<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Store;

class BerandaController extends Controller
{
    public function index()
    {
        $data['produk'] = Product::with(['kategori', 'toko', 'gambarProduk'])
            ->latest()
            ->take(8)
            ->get();

        $data['kategori'] = Category::withCount('produks')
            ->orderBy('nama_kategori')
            ->get();

        $data['populer'] = Product::with('gambarProduk')
            ->inRandomOrder()
            ->take(4)
            ->get();

        $data['toko_populer'] = Store::withCount('produks')
            ->orderBy('produks_count', 'DESC')
            ->take(4)
            ->get();

        return view('beranda', $data);
    }
}
