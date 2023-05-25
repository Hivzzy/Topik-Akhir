<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function getPesanan()
    {
        $pesanan = PesananModel::all();
        return $pesanan;
    }

    public function getDetailPesanan($id_pesanan)
    {
        $pesanan = PesananModel::where('id', $id_pesanan)->first();
        return $pesanan;
    }

    public function createPesanan($pesanan)
    {
        $add_pesanan = PesananModel::create([
            'user_id' => $pesanan['user'],
            'customer_id' => $pesanan['customer'],
            'order_status_id' => $pesanan['order_status'],
            'order_date' => $pesanan['tanggal_pemesanan'],
            'order_time' => $pesanan['waktu_pemesanan'],
            'delivery_date' => $pesanan['tanggal_pengiriman'],
            'payment_method' => $pesanan['metode_pembayaran'],
        ]);

        return $add_pesanan;
    }

    public function updatePesanan($pesanan, $id)
    {
        $edit_pesanan = PesananModel::where('id', $id)->update(
            array(
                'customer_id' => $pesanan['customer'],
                'order_status_id' => $pesanan['order_status'],
                'order_date' => $pesanan['tanggal_pemesanan'],
                'order_time' => $pesanan['waktu_pemesanan'],
                'delivery_date' => $pesanan['tanggal_pengiriman'],
                'payment_method' => $pesanan['metode_pembayaran'],
            )
        );

        return $edit_pesanan;
    }

    public function delete_pesanan($id_pesanan)
    {
        $delete_pesanan = PesananModel::where('id', $id_pesanan->delete());
        return $delete_pesanan;
    }

    public function users()
    {
        return $this->belongsTo(UserModel::class,'user_id');
    }

    public function customers()
    {
        return $this->belongsTo(PelangganModel::class,'customer_id');
    }

    public function status_pesanan()
    {
        return $this->belongsTo(StatusPesananModel::class,'order_status_id');
    }

    public function item_pesanan()
    {
        return $this->hasMany(ItemPesananModel::class);
    }
    public function pengiriman()
    {
        return $this->belongsTo(PengirimanModel::class, 'delivery_id');
    }

}

?>
