<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getKecamatan($id_kota)
    {
        $kecamatan = KecamatanModel::orderBy('district_name')->where('city_id', $id_kota)->get();
        return $kecamatan;
    }

    public function kota()
    {
        return $this->belongsTo(KotaModel::class, 'city_id');
    }
    
    public function kelurahans()
    {
        return $this->hasMany(KelurahanModel::class);
    }
}
