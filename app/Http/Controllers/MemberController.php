<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function memberDashboard()
    {
        $data['totalProduk'] = Product::count();
        $data['totalKategori'] = Category::count();
        return view('admin.dashboard', $data);
    }

    public function kategoriMember()
    {
        $data['categories'] = Category::all();
        return view('admin.kategori.index', $data);
    }
}
