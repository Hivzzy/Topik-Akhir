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

    public function getPesanan($date)
    {
        $pesanan = PesananModel::whereDate('delivery_date', '>=', date('Y-m-d', strtotime($date)))->orderBy('delivery_date', 'ASC')->get();
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

    public function getPenjualanHarian($tanggal)
    {
        $penjualan_harian = PesananModel::select(PesananModel::raw('orders.id, orders.delivery_date, customers.customer_name, SUM(order_items.item_selling_price * order_items.item_size) AS pendapatan, SUM(order_items.item_purchase_price * order_items.item_size) AS modal_belanja'))
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->where([
                ['orders.delivery_date', '=', $tanggal],
                ['orders.order_status_id', '=', 2],
                ['deliveries.delivery_status_id', '=', 2],
            ])
            ->groupBy(['orders.id', 'customers.customer_name'])
            ->get();

        return $penjualan_harian;
    }

    public function getPenjualanBulanan($bulan, $tahun)
    {
        $penjualan_bulanan = PesananModel::select(PesananModel::raw('orders.delivery_date, COUNT(orders.id) AS jumlah_pesanan, SUM(order_items.item_selling_price * order_items.item_size) AS pendapatan, SUM(order_items.item_purchase_price * order_items.item_size) AS modal_belanja'))
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->whereMonth('orders.delivery_date', $bulan)
            ->whereYear('orders.delivery_date', $tahun)
            ->where([
                ['orders.order_status_id', '=', 2],
                ['deliveries.delivery_status_id', '=', 2],
            ])
            ->groupBy('orders.delivery_date')
            ->get();

        return $penjualan_bulanan;
    }

    public function getPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir)
    {
        $penjualan_periode = PesananModel::select(PesananModel::raw('orders.delivery_date, COUNT(orders.id) AS jumlah_pesanan, SUM(order_items.item_selling_price * order_items.item_size) AS pendapatan, SUM(order_items.item_purchase_price * order_items.item_size) AS modal_belanja'))
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->whereBetween('orders.delivery_date', [$tanggal_awal, $tanggal_akhir])
            ->where([
                ['orders.order_status_id', '=', 2],
                ['deliveries.delivery_status_id', '=', 2],
            ])
            ->groupBy('orders.delivery_date')
            ->get();

        return $penjualan_periode;
    }

    public function getDataPenjualan($from_date, $to_date)
    {
        $id_penjualan = PesananModel::select('orders.id')
            ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->whereBetween('orders.delivery_date', [$from_date, $to_date])
            ->where([
                ['orders.order_status_id', '=', 2],
                ['deliveries.delivery_status_id', '=', 2],
            ])
            ->get()
            ->toArray();

        return $id_penjualan;
    }

    public function getItemPenjualan($id_pesanan)
    {
        $item_penjualan = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, units.unit_product_name AS satuan, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name', 'order_items.item_size', 'units.unit_product_name'])
            ->take(10)
            ->get();

        return $item_penjualan;
    }

    public function getWilayahPenjualan($id_pesanan)
    {
        $wilayah_penjualan = PesananModel::select(PesananModel::raw('COUNT(orders.id) AS jumlah_pesanan, urban_villages.urban_village_name AS kelurahan'))
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('urban_villages', 'urban_villages.id', '=', 'customers.urban_village_id')
            ->whereIn('orders.id', $id_pesanan)
            ->orderBy('jumlah_pesanan', 'DESC')
            ->groupBy(['urban_villages.urban_village_name'])
            ->take(10)
            ->get();

        return $wilayah_penjualan;
    }

    public function getPelangganPenjualan($id_pesanan)
    {
        $pelanggan = PesananModel::select(PesananModel::raw('COUNT(orders.id) AS jumlah_pesanan, customers.customer_name AS pelanggan'))
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->whereIn('orders.id', $id_pesanan)
            ->orderBy('jumlah_pesanan', 'DESC')
            ->groupBy(['pelanggan'])
            ->first();

        return $pelanggan;
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
