<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitModel extends Model
{
    use HasFactory;

    protected $table = 'unit';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function produk()
    {
        return $this->hasMany(ProdukModel::class);
    }
}
