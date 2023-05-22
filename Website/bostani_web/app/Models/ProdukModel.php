<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['category_id','sub_category_id','unit_id','product_name','product_purchase_price','product_selling_price','product_size'];

    protected $guarded = ['id'];
    public $timestamps = false;

    public function getProduk()
    {
        $key_cache = 'produk';
        $produk = Cache::get($key_cache);
        
        if ($produk) {
            return $produk;
        }
        $produk = ProdukModel::all();

        Cache::put($key_cache, $produk, 10);
        return $produk;
    }

    public function getDetailProduk($id_produk)
    {
        $produk = ProdukModel::where('id', $id_produk)->first();
        return $produk;
    }

    public function createProduk($produk)
    {
        $add_produk = ProdukModel::create([
            'category_id' => $produk['category'],
            'sub_category_id' => $produk['sub_category'],
            'unit_id' => $produk['unit'],
            'product_name' => $produk['product_name'],
            'product_purchase_price' => $produk['purchase_price'],
            'product_selling_price' => $produk['selling_price'],
            'product_size' => $produk['size'],
        ]);

        return $add_produk;
    }

    public function updateProduk($produk, $id)
    {
        $edit_produk = ProdukModel::where('id', $id)->update(
            array(
                'category_id' => $produk['category'],
                'sub_category_id' => $produk['sub_category'],
                'unit_id' => $produk['unit'],
                'product_name' => $produk['product_name'],
                'product_purchase_price' => $produk['purchase_price'],
                'product_selling_price' => $produk['selling_price'],
                'product_size' => $produk['size'],
            )
        );

        return $edit_produk;
    }

    public function deleteProduk($id_produk)
    {
        $delete_produk = ProdukModel::where('id', $id_produk)->delete();
        return $delete_produk;
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'category_id');
    }

    public function sub_kategori()
    {
        return $this->belongsTo(SubKategoriModel::class, 'sub_category_id');
    }

    public function satuan()
    {
        return $this->belongsTo(UnitModel::class, 'unit_id');
    }

    public function item_pesanan()
    {
        return $this->hasMany(UnitModel::class);
    }
}

