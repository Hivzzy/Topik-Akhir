<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriModel extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getSubKategori($id_kategori)
    {
        $sub_kategori = SubKategoriModel::where('category_id', $id_kategori)->get();
        return $sub_kategori;
    }

    public function createSubKategori($sub_kategori){

        $add_subkategori = SubKategoriModel::create([
            'category_id' => $sub_kategori['kategori_id'], 
            'sub_category_name' => $sub_kategori['nama_sub_kategori'],
        ]);

        return $add_subkategori;
    }

    public function editSubKategori($sub_kategori, $id)
    {
        $edit_subkategori = SubKategoriModel::where('id', $id)->update([
            'sub_category_name' => $sub_kategori['nama_sub_kategori'],
        ]);
        return $edit_subkategori;
    }

    public function deleteSubKategori($id)
    {
        $delete_subkategori = SubKategoriModel::where('id', $id)->delete();
        return $delete_subkategori;
    }

    public function kategori() 
    {
        return $this->belongsTo(KategoriModel::class, 'category_id');
    }

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }
}
