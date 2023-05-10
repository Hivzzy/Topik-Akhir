<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'category';
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

    public function editKategori($kategori, $id)
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

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }

    public function sub_kategoris()
    {
        return $this->hasMany(SubKategoriModel::class);
    }
}
