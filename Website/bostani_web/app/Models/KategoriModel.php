<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getKategori()
    {
        $kategori = KategoriModel::all();
        return $kategori;
    }

    public function createKategori($kategori)
    {
        $add_kategori = KategoriModel::create([
            'category_name' => $kategori['nama_kategori'],
        ]);

        return $add_kategori;
    }

    public function updateKategori($kategori, $id)
    {
        $edit_kategori = KategoriModel::where('id', $id)->update([
            'category_name' => $kategori['nama_kategori'],
        ]);
        return $edit_kategori;
    }

    public function deleteKategori($id)
    {
        $delete_kategori = KategoriModel::where('id', $id)->delete();
        return $delete_kategori;
    }

    public function listProduk($id)
    {
        $data = KategoriModel::select('categories.category_name', 'products.product_name')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->where('categories.id', $id)
            ->get()
            ->toArray();

        return $data;
    }

    public function listSubKategori($id)
    {
        $data = KategoriModel::select('categories.category_name', 'sub_categories.sub_category_name')
            ->join('sub_categories', 'sub_categories.category_id', '=', 'categories.id')
            ->where('categories.id', $id)
            ->get()
            ->toArray();

        return $data;
    }

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }

    public function sub_kategoris()
    {
        return $this->hasMany(SubKategoriModel::class);
    }
}
