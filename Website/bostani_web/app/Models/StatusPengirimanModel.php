<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statusPengirimanModel extends Model
{
    use HasFactory;


    protected $table = 'delivery_status';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getStatusPengiriman()
    {
        $statusPengiriman = statusPengirimanModel::all();
        return $statusPengiriman;
    }

    public function getDetailStatusPengiriman($id_status_pengiraman)
    {
        $statusPengiriman = statusPengirimanModel::where('id', $id_status_pengiriman)->first();
        return $statusPengiriman;
    }
    public function pengiriman()
    {
        return $this->hasMany(PengirimanModel::class,'id');
    }
}
?>
