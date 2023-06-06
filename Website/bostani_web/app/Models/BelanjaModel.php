<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BelanjaModel extends Model
{
    use HasFactory;

    protected $table = 'shop_items';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function createKeteranganItemBelanja($keterangan, $id)
    {
        $data = BelanjaModel::create([
            'order_item_id' => $id,
            'shop_item_information' => $keterangan,
        ]);

        return $data->id;
    }

    public function updateKeteranganItemBelanja($keterangan, $id)
    {
        BelanjaModel::where('id', $id)->update([
            'shop_item_information' => $keterangan,
        ]);
    }

    public function deleteKeteranganItemBelanja($id)
    {
        BelanjaModel::where('id', $id)->delete();
    }

    public function order_item()
    {
        return $this->belongsTo(ItemPesananModel::class, 'order_item_id');
    }
}
