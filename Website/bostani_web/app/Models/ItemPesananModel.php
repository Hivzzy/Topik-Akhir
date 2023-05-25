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

    public function createItemPesanan($item_pesanan)
    {
        $add_item_pesanan = ItemPesananModel::create([
            'order_id' => $item_pesanan['order_id'],
            'product_id' => $item_pesanan['product_id'],
            'number_of_item' => $item_pesanan['number_of_item'],
            'item_purchase_price' => $item_pesanan['item_purchase_price'],
            'item_selling_price' => $item_pesanan['item_selling_price'],
        ]);

        return $add_item_pesanan;
    }

    public function updateItemPesanan($item_pesanan, $id)
    {
        $edit_item_pesanan = ItemPesananModel::where('id', $id)->update(
            array(
                'product_id' => $item_pesanan['product_id'],
                'number_of_item' => $item_pesanan['number_of_item'],
                'item_purchase_price' => $item_pesanan['item_purchase_price'],
                'item_selling_price' => $item_pesanan['item_selling_price'],
            )
        );

        return $edit_item_pesanan;
    }

    public function deleteItemPesanan($id_item_pesanan)
    {
        $delete_item_pesanan = ItemPesananModel::where('id', $id_item_pesanan->delete());
        return $delete_item_pesanan;
    }

    public function pesanan()
    {
        return $this->belongsTo(PesananModel::class,'order_id');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class,'product_id');
    }

}

?>
