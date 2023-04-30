<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 't_kategori';
    protected $guarded = ['id'];

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }

    public function sub_kategoris()
    {
        return $this->hasMany(SubKategoriModel::class);
    }
}
