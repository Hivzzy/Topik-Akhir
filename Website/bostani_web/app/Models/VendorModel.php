<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;

    protected $table = 't_vendor';
    protected $guarded = ['id'];

    public function produks()
    {
        return $this->hasMany(ProdukModel::class);
    }
}
