<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriModel extends Model
{
    use HasFactory;

    protected $table = 't_sub_kategori';
    protected $guarded = ['id'];

    public function kategori() 
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori');
    }

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }
}
