<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesananModel extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getItemPesanan($id_pesanan)
    {
        $item_pesanan = ItemPesananModel::where('order_id', $id_pesanan)->get();
        return $item_pesanan;
    }

    static function createItemPesanan($item_pesanan)
    {
        $add_item_pesanan = ItemPesananModel::create([
            'order_id' => $item_pesanan['order_id'],
            'product_id' => $item_pesanan['product_id'],
            'item_size' => $item_pesanan['number_of_item'],
            'item_purchase_price' => $item_pesanan['item_purchase_price'],
            'item_selling_price' => $item_pesanan['item_selling_price'],
        ]);

        // return $add_item_pesanan;
    }

    static function updateItemPesanan($item_pesanan, $id)
    {
        $edit_item_pesanan = ItemPesananModel::where('order_id', $id)->update(
            array(
                'product_id' => $item_pesanan['product_id'],
                'item_size' => $item_pesanan['number_of_item'],
                'item_purchase_price' => $item_pesanan['item_purchase_price'],
                'item_selling_price' => $item_pesanan['item_selling_price'],
            )
        );

        // return $edit_item_pesanan;
    }

    public function deleteItemPesanan($id_pesanan)
    {
        $delete_item_pesanan = ItemPesananModel::where('order_id', $id_pesanan)->delete();
        return $delete_item_pesanan;
    }

    public function getItemBelanja($id_pesanan)
    {
        $item_belanja = ItemPesananModel::whereIn('order_id', $id_pesanan)->orderBy('id', 'ASC')->get();
        return $item_belanja;
    }

    public function getTotalItem($id_pesanan) {
        $item_belanja = ItemPesananModel::select(ItemPesananModel::raw('products.product_name, units.unit_product_name, order_items.item_purchase_price, SUM(order_items.item_size) as jumlah'))
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('units', 'products.unit_id', '=', 'units.id')
        ->whereIn('order_id', $id_pesanan)
        ->groupBy(['products.product_name', 'order_items.item_purchase_price','units.unit_product_name'])
        ->get();
        
        return $item_belanja;
    }

    static function updateKeteranganProdukPesanan($order_item_id, $shop_id)
    {
        ItemPesananModel::where('id', $order_item_id)->update([
            'shop_item_id' => $shop_id,
        ]);
    }

    public function pesanan()
    {
        return $this->belongsTo(PesananModel::class,'order_id');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class,'product_id');
    }

    public function belanja()
    {
        return $this->hasOne(BelanjaModel::class, 'order_item_id');
    }
}

?>
