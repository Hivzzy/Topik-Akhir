<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 't_produk';
    protected $guarded = ['id'];

    public function getProduk()
    {
        $produk = ProdukModel::paginate(7);
        return $produk;
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori');
    }

    public function sub_kategori()
    {
        return $this->belongsTo(SubKategoriModel::class, 'id_sub_kategori');
    }

    public function vendor()
    {
        return $this->belongsTo(VendorModel::class, 'id_vendor');
    }
}
