<?php

namespace App\Http\Controllers;

use App\Models\BelanjaModel;
use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\ItemPesananModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ItemPesananController extends Controller
{

    public function addToCartItemPesanan(Request $request)
    {
        if ($request->product_id == '' || $request->quantity == '') {
            return response()->json(['message' => 'Harap isi data item pesanan!'], 400);
        }

        if ($request->quantity <= 0) {
            return response()->json(['message' => 'Jumlah item tidak valid!'], 400);
        }

        $product = ProdukModel::find($request->product_id);
        if (!$product) {
            return response()->json(['message' => 'Item pesanan tidak ditemukan'], 404);
        }

        $cart = Session()->get('cart', []);

        // Cek apakah produk sudah ada di dalam cart
        if (array_key_exists($product->id, $cart)) {
            // Kondisi jika terdapat item yang sama
            $cart[$product->id]['item_size'] += $request->quantity;
        } else {
            // Kondisi jika item tidak sama
            $cart[$product->id] = [
                'product_id' => $product->id,
                'item_name' => $product->product_name,
                'item_size' => $request->quantity,
                'item_unit' => $product->satuan->unit_product_name,
                'item_purchase_price' => $product->product_purchase_price,
                'item_selling_price' => $product->product_selling_price,
                // 'sub_total' => $request->quantity * $product->product_seliing_price,
            ];
        }

        Session::put('cart', $cart);
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);
        return view('pages.pesanan.CartView')->with([
            'data' => $cart
        ]);
    }

    public function deleteItemCart($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]);
        Session::put('cart', $cart);
    }

    public function deleteAllCart()
    {
        if (Session::get('cart') != []) {
            Session::forget('cart');
            return response()->json(['message' => 'Item pesanan berhasil dihapus!'], 200);
        } else {
            return response()->json(['message' => 'Item pesanan sudah kosong!'], 400);
        }
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
        $add_item_pesanan = $$item_pesanan->createItemPesanan($request->all());

        if ($add_item_pesanan) {
            return redirect('/pesanan');
        } else {
            Alert::error('Error', 'ItemPesanan gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function createKeteranganItemBelanja(Request $request, $id)
    {
        $cek = ItemPesananModel::find($id);

        if ($cek->shop_item_id != null) {
            toast('Produk sudah memiliki keterangan', 'error');
            return redirect()->back();
        }

        $belanja = new BelanjaModel();
        $item = new ItemPesananModel();

        $id_info = $belanja->createKeteranganItemBelanja($request->all()['product_information'], $id);
        $item->updateShopId($id, $id_info);

        toast('Keterangan berhasil ditambahkan', 'success');
        return redirect('/belanja');
    }

    public function updateKeteranganItemBelanja(Request $request, $id)
    {
        $belanja = new BelanjaModel();
        $belanja->updateKeteranganItemBelanja($request->all()['product_information'], $id);
        toast('Keterangan berhasil diperbarui', 'success');
        return redirect('/belanja');
    }

    public function deleteKeteranganItemBelanja($id)
    {
        $order_item_id = BelanjaModel::find($id);

        $belanja = new BelanjaModel();
        $item = new ItemPesananModel();

        $belanja->deleteKeteranganItemBelanja($id);
        $item->updateShopId($order_item_id->order_item_id, null);

        toast('Keterangan berhasil dihapus', 'success');
        return redirect('/belanja');
    }
}
