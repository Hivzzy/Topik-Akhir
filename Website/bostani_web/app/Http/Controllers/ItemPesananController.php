<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\ItemPesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ItemPesananController extends Controller
{

    public function addToCartItemPesanan(Request $request,$productId, $quantity){
        $product = ProdukModel::findOrFail($id);
        $cart = $request->session()->get('cart', new Cart());
        $cartDetailData = [
            'id' => $product->id,
            'product_name' => $product->product_name,
            'item_size' => $quantity,
            'item_purchase_price' => $product->item_purchase_price,
            'item_selling_price' => $product->item_selling_price,
        ];
        $cart->items[] = $cartDetailData;
        $request->session()->put('cart', $cart);

        return redirect('/addPesanan');
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
