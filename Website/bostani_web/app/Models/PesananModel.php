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

    static function updateStatusPengiriman($id_pesanan, $list)
    {
        $edit_statusPengiriman = PesananModel::where('id', $id_pesanan)->update(
            array(
                'delivery_id' => $list['delivery_id'],
            )
        );

        return $edit_statusPengiriman;
    }

    static function deletePengiriman($id)
    {
        $delete_pengiriman = PesananModel::where('delivery_id', $id)->update(
            array(
                'delivery_id' => null,
            )
        );

        return $delete_pengiriman;
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
            // ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->join('deliveries', 'deliveries.id', '=', 'orders.delivery_id')
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
        $penjualan_bulanan = PesananModel::select(PesananModel::raw('orders.delivery_date AS tanggal_transaksi, COUNT(orders.id) AS jumlah_pesanan'))
            // ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->join('deliveries', 'deliveries.id', '=', 'orders.delivery_id')
            ->whereMonth('orders.delivery_date', $bulan)
            ->whereYear('orders.delivery_date', $tahun)
            ->where([
                ['orders.order_status_id', '=', 2],
                ['deliveries.delivery_status_id', '=', 2],
            ])
            ->groupBy('tanggal_transaksi')
            ->get();

        return $penjualan_bulanan;
    }

    public function getPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir)
    {
        $penjualan_periode = PesananModel::select(PesananModel::raw('orders.delivery_date AS tanggal_transaksi, COUNT(orders.id) AS jumlah_pesanan'))
            // ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->join('deliveries', 'deliveries.id', '=', 'orders.delivery_id')
            ->whereBetween('orders.delivery_date', [$tanggal_awal, $tanggal_akhir])
            ->where([
                ['orders.order_status_id', '=', 2],
                ['deliveries.delivery_status_id', '=', 2],
            ])
            ->groupBy('tanggal_transaksi')
            ->get();

        return $penjualan_periode;
    }

    public function getTotalTransaksi($tanggal_transaksi)
    {
        $total_transaksi = ItemPesananModel::select(ItemPesananModel::raw('orders.delivery_date AS tanggal_transaksi, SUM(order_items.item_selling_price * order_items.item_size) AS pendapatan, SUM(order_items.item_purchase_price * order_items.item_size) AS modal_belanja'))
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereIn('orders.delivery_date', $tanggal_transaksi)
            ->groupBy('tanggal_transaksi')
            ->orderBy('tanggal_transaksi', 'ASC')
            ->get();

        return $total_transaksi;
    }

    public function getDataPenjualan($from_date, $to_date)
    {
        $id_penjualan = PesananModel::select('orders.id')
            // ->join('deliveries', 'deliveries.order_id', '=', 'orders.id')
            ->join('deliveries', 'deliveries.id', '=', 'orders.delivery_id')
            ->whereBetween('orders.delivery_date', [$from_date, $to_date])
            ->where([
                ['orders.order_status_id', '=', 2],
                ['deliveries.delivery_status_id', '=', 2],
            ])
            ->get()
            ->toArray();

        return $id_penjualan;
    }

    public function getWilayahPenjualan($id_pesanan)
    {
        $wilayah_penjualan = PesananModel::select(PesananModel::raw('COUNT(orders.id) AS jumlah_pesanan, urban_villages.urban_village_name AS kelurahan'))
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('urban_villages', 'urban_villages.id', '=', 'customers.urban_village_id')
            ->whereIn('orders.id', $id_pesanan)
            ->orderBy('jumlah_pesanan', 'DESC')
            ->groupBy(['kelurahan'])
            ->take(10)
            ->get();

        return $wilayah_penjualan;
    }

    public function getPelangganPalingSeringPesan($id_pesanan)
    {
        $pelanggan = PesananModel::select(PesananModel::raw('COUNT(orders.id) AS jumlah_pesanan, customers.customer_name AS pelanggan'))
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->whereIn('orders.id', $id_pesanan)
            ->orderBy('jumlah_pesanan', 'DESC')
            ->groupBy(['pelanggan'])
            ->first();

        return $pelanggan;
    }

    public function getKelurahanPalingBanyakPesanan($id_pesanan)
    {
        $kelurahan = PesananModel::select(PesananModel::raw('COUNT(orders.id) AS jumlah_pesanan, urban_villages.urban_village_name AS kelurahan'))
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('urban_villages', 'urban_villages.id', '=', 'customers.urban_village_id')
            ->whereIn('orders.id', $id_pesanan)
            ->orderBy('jumlah_pesanan', 'DESC')
            ->groupBy(['kelurahan'])
            ->first();

        return $kelurahan;
    }

    public function getKecamatanPalingBanyakPesanan($id_pesanan)
    {
        $kecamatan = PesananModel::select(PesananModel::raw('COUNT(orders.id) AS jumlah_pesanan, districts.district_name AS kecamatan'))
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('urban_villages', 'urban_villages.id', '=', 'customers.urban_village_id')
            ->join('districts', 'urban_villages.district_id', '=', 'districts.id')
            ->whereIn('orders.id', $id_pesanan)
            ->orderBy('jumlah_pesanan', 'DESC')
            ->groupBy(['kecamatan'])
            ->first();

        return $kecamatan;
    }

    public function getInfoPesanan()
    {
        $from_date = date("Y-m-d", strtotime("+1 day"));
        $to_date = date("Y-m-d", strtotime("+3 day"));
        $info_pesanan = PesananModel::whereBetween('delivery_date', [$from_date, $to_date])
            ->orderBy('delivery_date', 'ASC')
            ->get();

        return $info_pesanan;
    }

    public function getItemProdukKg($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Kg')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukBungkus($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Bungkus')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukBongkol($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Bongkol')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukTray($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Tray')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukIkat($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Ikat')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukButir($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Butir')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukPack($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Pack')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukPaket($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Paket')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
    }

    public function getItemProdukPasang($id_pesanan)
    {
        $produk_kg = ItemPesananModel::select(ItemPesananModel::raw('products.product_name AS nama_item, SUM(order_items.item_size) AS jumlah_item'))
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->whereIn('order_items.order_id', $id_pesanan)
            ->where('units.unit_name', 'Pasang')
            ->orderBy('jumlah_item', 'DESC')
            ->groupBy(['products.product_name'])
            ->take(10)
            ->get();

        return $produk_kg;
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
