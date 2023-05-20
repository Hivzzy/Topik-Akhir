<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanModel extends Model
{
    use HasFactory;

    protected $table = 'urban_villages';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getKelurahan($id_kecamatan)
    {
        $kelurahan = KelurahanModel::orderBy('urban_village_name')->where('district_id', $id_kecamatan)->get();
        return $kelurahan;
    }

    public function kecamatan()
    {
        return $this->belongsTo(KecamatanModel::class, 'district_id');
    }

    public function pelanggans()
    {
        return $this->hasMany(PelangganModel::class);
    }
}
