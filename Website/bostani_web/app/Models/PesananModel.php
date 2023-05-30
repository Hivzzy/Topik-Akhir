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
        $user_id = auth()->user()->id;
        $status_id = 1;

        $add_pesanan = PesananModel::create([
            'user_id' => $user_id,
            'customer_id' => $pesanan['pelanggan'],
            'order_status_id' => $status_id,
            'delivery_date' => $pesanan['tanggal_kirim'],
            'payment_method' => $pesanan['metode_pembayaran'],
            'shipping_cost' => $pesanan['ongkos_kirim'],
        ]);

        return $add_pesanan->id;
    }

    public function updatePesanan($pesanan, $id)
    {
        $user_id = auth()->user()->id;
        $status_id = 1;
        $edit_pesanan = PesananModel::where('id', $id)->update(
            array(
                'user_id' => $user_id,
                'customer_id' => $pesanan['pelanggan'],
                'order_status_id' => $status_id,
                'delivery_date' => $pesanan['tanggal_kirim'],
                'payment_method' => $pesanan['metode_pembayaran'],
                'shipping_cost' => $pesanan['ongkos_kirim'],
            )
        );

        return $edit_pesanan;
    }

    public function deletePesanan($id_pesanan)
    {
        $delete_pesanan = PesananModel::where('id', $id_pesanan)->delete();
        return $delete_pesanan;
    }

    public function updateStatusPesanan($order_id, $status_id)
    {
        $update_status = PesananModel::where('id', $order_id)->update(['order_status_id' => $status_id]);
        return $update_status;
    }

    public function getListBelanja($tanggal_kirim)
    {
        $belanja = PesananModel::where([
            ['delivery_date', date($tanggal_kirim)],
            ['order_status_id', 1],
        ])->get(['id', 'customer_id']);
        return $belanja;
    }

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function customers()
    {
        return $this->belongsTo(PelangganModel::class, 'customer_id');
    }

    public function status_pesanan()
    {
        return $this->belongsTo(StatusPesananModel::class, 'order_status_id');
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
