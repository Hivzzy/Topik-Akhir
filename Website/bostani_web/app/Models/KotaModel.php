<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaModel extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getKota()
    {
        $kota = KelurahanModel::all();
        return $kota;
    }

    public function kecamatan()
    {
        return $this->hasMany(KecamatanModel::class);
    }
}
