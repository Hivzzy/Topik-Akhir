<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanModel extends Model
{
    use HasFactory;

    protected $table = 'deliveries';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function getPengiriman()
    {
        $pengiriman = PengirimanModel::all();
        return $pengiriman;
    }

    public function getDetailPengiriman($id_pengiriman)
    {
        $pengiriman = PengirimanModel::where('id', $id_pengiriman)->first();
        return $pengiriman;
    }

    public function createPengiriman($pengiriman)
    {
        $add_pengiriman = PengirimanModel::create([
            'delivery_status_id' => $pengiriman['delivery_status'],
            'driver_id' => $pengiriman['driver'],
            'delivery_date' => $pengiriman['tanggal_pengiriman'],
        ]);

        return $add_pesanan;
    }

    public function updatePengiriman($pengiriman, $id)
    {
        $edit_pengiriman = PengirimanModel::where('id', $id)->update(
            array(
                'delivery_status_id' => $pengiriman['delivery_status'],
                'driver_id' => $pengiriman['driver'],
                'delivery_date' => $pengiriman['tanggal_pengiriman'],
            )
        );

        return $edit_pengiriman;
    }

    public function deletePengiriman($id_pengiriman)
    {
        $delete_pengiriman = PengirimanModel::where('id', $id_pengiriman->delete());
        return $delete_pengiriman;
    }

    public function drivers()
    {
        return $this->belongsTo(DriversModel::class,'driver_id');
    }

    public function status_pengiriman()
    {
        return $this->belongsTo(StatusPengirimanModel::class,'delivery_status_id');
    }
    public function pesanan()
    {
        return $this->hasMany(PesananModel::class);
    }

}

?>
