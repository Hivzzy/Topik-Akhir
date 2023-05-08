<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriModel extends Model
{
    use HasFactory;

    protected $table = 'sub_category';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getSubKategori($id_kategori)
    {
        $sub_kategori = SubKategoriModel::where('category_id', $id_kategori)->get();
        return $sub_kategori;
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
