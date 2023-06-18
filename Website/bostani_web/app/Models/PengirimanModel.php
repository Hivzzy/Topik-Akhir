<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengirimanModel extends Model
{
    use HasFactory;

    protected $table = 'deliveries';
    protected $guarded = ['id'];
    public $timestamps = false;


    // public function getPengiriman()
    // {
    //     $pengiriman = PengirimanModel::whereHas('pesanans', function ($query) {
    //         $query->where('order_status_id', 2);
    //     })->get();
    //     return $pengiriman;
    // }

    public function getPengiriman()
    {
        $pengiriman = PengirimanModel::all();
        return $pengiriman;
    }

    public function getDetailPengiriman($id_pengiriman)
    {
        $pengiriman = PengirimanModel::with('statusPengiriman')->where('id', $id_pengiriman)->first();
        return $pengiriman;
    }

    public function createPengiriman($pengiriman)
    {
        $status_id = 1;
        $add_pengiriman = new PengirimanModel;
        $add_pengiriman = PengirimanModel::create([
            'delivery_status_id' => $status_id,
            'driver_type' => $pengiriman['driver_type'],
        ]);
        return $add_pengiriman;
    }

    public function updateStatusPengiriman($delivery_id, $delivery_status_id)
    {
        $update_status = PengirimanModel::where('id', $delivery_id)->update(['delivery_status_id' => $delivery_status_id]);
        return $update_status;
    }

    public function updatePengiriman($pengiriman, $id)
    {
        $edit_pengiriman = PengirimanModel::where('id', $id)->update(
            array(
                'delivery_status_id' => $pengiriman['delivery_status'],
                'driver_type' => $pengiriman['driver'],
            )
        );

        return $edit_pengiriman;
    }

    public function deletePengiriman($id)
    {
        $delete_pengiriman = PengirimanModel::where('id', $id)->delete();
        return $delete_pengiriman;
    }

    // public function drivers()
    // {
    //     return $this->belongsTo(DriversModel::class,'driver_id');
    // }

    public function statusPengiriman()
    {
        return $this->belongsTo(StatusPengirimanModel::class,'delivery_status_id');
    }
    public function pesanans()
    {
        return $this->hasMany(PesananModel::class, 'delivery_id');
    }
}

?>
