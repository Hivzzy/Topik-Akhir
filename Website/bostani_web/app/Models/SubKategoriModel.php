<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriModel extends Model
{
    use HasFactory;

    protected $table = 't_sub_kategori';
    protected $guarded = ['id'];

    public function getSubKategori($id_kategori)
    {
        $sub_kategori = SubKategoriModel::where('id_kategori', $id_kategori)->get();
        return $sub_kategori;
    }

    public function kategori() 
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori');
    }

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }
}
