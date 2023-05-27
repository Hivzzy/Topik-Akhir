<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\ItemPesananModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ItemPesananController extends Controller
{

   public function addToCartItemPesanan(Request $request){

        $product = ProdukModel::find($request->product_id);
        if (!$product) {
            return response()->json(['message' => 'Item pesanan tidak ditemukan'], 404);
        }
        $cart = Session()->get('cart',[]);

        // Cek apakah produk sudah ada di dalam cart
        if (array_key_exists($product->id, $cart)) {
            // Kondisi jika terdapat item yang sama
            return response()->json(['message' => 'Item pesanan telah diinputkan'], 422);
        } else {
            // Kondisi jika item tidak sama
            $cart[$product->id] = [
                'product_id' => $produk->id,
                'item_name' =>$produk->product_name,
                'item_size' => $request->quantity,
                'item_unit' => $product->satuan,
                'item_purchase_price' => $product->harga,
                'item_selling_price' => $product->item_selling_price,
                'sub_total' => $request->quantity * $product->harga,
            ];
        }

        Session::put('cart', $cart);
        return redirect('/addPesanan');
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);

        return response()->json($cart);
    }

    public function createItemPesanan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'unit' => 'required',
            'item_purchase_price' => 'required',
            'item_selling_price' => 'required',
            'item_size' => 'required',
        ]);

        $item_pesanan = new ItemPesananModel();
        $add_item_pesanan= $pesanan->createItemPesanan($validatedData);

        if ($add_item_pesanan) {
            return redirect('/pesanan');
        } else {
            Alert::error('Error', 'ItemPesanan gagal ditambahkan');
            return redirect()->back();
        }

    }
}


?>
