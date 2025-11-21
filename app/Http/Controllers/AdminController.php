<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function member(){
        $user = Auth::user();
        $toko = Store::where('id_user', $user->id)->first();
        $data['totalProduk'] = Product::where('id_toko', $toko ? $toko->id : null)->count();
        $data['totalKategori'] = Category::count();

        return view('admin.dashboard', $data);
    }

    public function dashboard()
    {
        $data['totalToko']      = Store::count();
        $data['totalPengguna']  = User::count();
        $data['totalProdukAll'] = Product::count();

        return view('admin.dashboard', $data);
    }

    public function produkIndex()
    {
        $data['products'] = Product::with(['category', 'store'])->orderBy('created_at', 'desc')->get();

        return view('admin.produk.index', $data);
    }

    public function produkDestroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
