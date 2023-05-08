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

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }

    public function sub_kategoris()
    {
        return $this->hasMany(SubKategoriModel::class);
    }
}
