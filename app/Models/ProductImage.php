<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }

    public function url()
    {
        return asset('storage/product_images/' . $this->nama_gambar);
    }
}
