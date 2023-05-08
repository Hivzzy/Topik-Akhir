<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getProduk()
    {
        $produk = ProdukModel::all();
        return $produk;
    }

    public function getDetailProduk($id_produk)
    {
        $produk = ProdukModel::where('id', $id_produk)->first();
        return $produk;
    }

    public function createProduk($produk)
    {
        $add_produk = DB::table('t_produk')->insert(
            array(
                'id_kategori' => $produk['kategori'],
                'id_sub_kategori' => $produk['sub_kategori'],
                'id_vendor' => $produk['vendor'],
                'nama_produk' => $produk['nama_produk'],
                'satuan_produk' => $produk['satuan'],
                'ukuran_produk' => $produk['ukuran'],
                'harga_beli_produk' => $produk['harga_beli'],
                'harga_jual_produk' => $produk['harga_jual'],
            )
        );

        return $add_produk;
    }

    public function updateProduk($produk, $id)
    {
        $edit_produk = DB::table('t_produk')->where('id', $id)->update(
            array(
                'id_kategori' => $produk['kategori'],
                'id_sub_kategori' => $produk['sub_kategori'],
                'id_vendor' => $produk['vendor'],
                'nama_produk' => $produk['nama_produk'],
                'satuan_produk' => $produk['satuan'],
                'ukuran_produk' => $produk['ukuran'],
                'harga_beli_produk' => $produk['harga_beli'],
                'harga_jual_produk' => $produk['harga_jual'],
            )
        );

        return $edit_produk;
    }

    public function deleteProduk($id_produk)
    {
        $delete_produk = DB::table('t_produk')->where('id', $id_produk)->delete();
        return $delete_produk;
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'category_id');
    }

    public function sub_kategori()
    {
        return $this->belongsTo(SubKategoriModel::class, 'sub_category_id');
    }

    public function satuan()
    {
        return $this->belongsTo(UnitModel::class, 'unit_id');
    }
}
