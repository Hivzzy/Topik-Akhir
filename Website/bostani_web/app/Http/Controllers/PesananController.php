<?php

namespace App\Http\Controllers;

use App\Models\ItemPesananModel;
use App\Models\KotaModel;
use App\Models\PelangganModel;
use App\Models\PesananModel;
use App\Models\ProdukModel;
use App\Models\StatusPesananModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PesananController extends Controller
{
    public function index()
    {
        if (Session::get('cart') != []) {
            Session::forget('cart');
        }

        $today = now();
        $pesanan = new PesananModel();
        $data = $pesanan->getPesanan($today);

        $title = 'Hapus Pesanan!';
        $text = "Anda yakin ingin menghapus data pesanan?";
        confirmDelete($title, $text);

        return view('pages.pesanan.PesananView', [
            'title' => 'Data Pesanan',
            'active' => 'order',
            'orders' => $data,
        ]);
    }

    public function displayTambahPesanan()
    {
        return view('pages.pesanan.TambahPesananView', [
            'title' => 'Tambah Pesanan',
            'active' => 'order',
            'customers' => PelangganModel::all(),
            'cities' => KotaModel::all(),
            'products' => ProdukModel::all(),
        ]);
    }

    public function displayEditPesanan($id)
    {
        $pesanan = PesananModel::find($id);
        $items = ItemPesananModel::where('order_id', $pesanan->id)->get();
        PesananController::getItem($items);

        return view('pages.pesanan.EditPesananView', [
            'title' => 'Edit Pesanan',
            'active' => 'order',
            'customers' => PelangganModel::all(),
            'cities' => KotaModel::all(),
            'products' => ProdukModel::all(),
            'pesanan' => $pesanan,
        ]);
    }

    public function getItem($items)
    {
        $cart = Session::get('cart', []);
        foreach ($items as $item) {
            $cart[$item->product_id] = [
                'product_id' => $item->product_id,
                'item_name' => $item->produk->product_name,
                'item_size' => $item->item_size,
                'item_unit' => $item->produk->satuan->unit_product_name,
                'item_purchase_price' => $item->item_purchase_price,
                'item_selling_price' => $item->item_selling_price,
                // 'sub_total' => $item->item_size * $item->item_seliing_price,
            ];
            Session::put('cart', $cart);
        }
    }

    public function getDetailPesanan($id_pesanan)
    {
        $detail_pesanan = new PesananModel();
        $item_pesanan = new ItemPesananModel();

        return view('pages.pesanan.DetailPesananView', [
            'title' => 'Detail Pesanan',
            'active' => 'order',
            'order' => $detail_pesanan->getDetailPesanan($id_pesanan),
            'items' => $item_pesanan->getItemPesanan($id_pesanan),
            'order_status' => StatusPesananModel::all(),
        ]);
    }

    public function createPesanan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pelanggan' => 'required',
            'no_telepon' => 'required|min:10|numeric',
            'alamat' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'tanggal_kirim' => 'required',
            'metode_pembayaran' => 'required',
            'ongkos_kirim' => 'required',
        ]);
        // Mengecek inputan tidak sesuai
        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput($request->all());
        }
        // Mengecek item pesanan
        if (Session::get('cart') == []) {
            toast('Harap isi item pesanan!', 'error');
            return redirect()->back()->withInput($request->all());
        }
        // Mengecek alamat pelanggan
        $pelanggan = new PelangganModel();
        $cek_pelanggan = $pelanggan->getPelangganById($request['pelanggan']);
        if ($cek_pelanggan->customer_address != $request['alamat']) {
            $pelanggan_baru = [
                'kelurahan' => $request->all()['kelurahan'],
                'nama_pelanggan' => $cek_pelanggan->customer_name,
                'no_telepon' => $request['no_telepon'],
                'alamat' => $request['alamat'],
            ];
            $add_pelanggan = $pelanggan->createPelanggan($pelanggan_baru);
            $request['pelanggan'] = $add_pelanggan;
        }
        // dd($request['pelanggan']);
        // Create data pesanan
        $pesanan = new PesananModel();
        $id_pesanan = $pesanan->createPesanan($request->all());
        // Create data item pesanan
        $cart = Session::get('cart');
        foreach ($cart as $c => $val) {
            $item_pesanan = [
                'order_id' => $id_pesanan,
                'product_id' => $val['product_id'],
                'number_of_item' => $val['item_size'],
                'item_purchase_price' => $val['item_purchase_price'],
                'item_selling_price' => $val['item_selling_price'],
            ];
            ItemPesananModel::createItemPesanan($item_pesanan);
        }

        if ($id_pesanan != null) {
            Session::forget('cart');
            Alert::success('Success', 'Data pesanan berhasil ditambahkan');
            return redirect('/pesanan');
        } else {
            Alert::error('Error', 'Data pesanan gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function updatePesanan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pelanggan' => 'required',
            'no_telepon' => 'required|min:10|numeric',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'tanggal_kirim' => 'required',
            'metode_pembayaran' => 'required',
            'ongkos_kirim' => 'required',
        ]);

        // Mengecek inputan tidak sesuai
        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput($request->all());
        }

        // Mengecek item pesanan
        if (Session::get('cart') == []) {
            toast('Harap isi item pesanan!', 'error');
            return redirect()->back()->withInput($request->all());
        }

        // Hapus item pesanan sebelumnya
        $item_pesanan = new ItemPesananModel();
        $item_pesanan->deleteItemPesanan($id);

        // Insert item pesanan baru
        $pesanan = new PesananModel();
        $id_pesanan = $pesanan->updatePesanan($request->all(), $id);

        $cart = Session::get('cart');
        foreach ($cart as $c => $val) {
            $item_pesanan = [
                'order_id' => $id,
                'product_id' => $val['product_id'],
                'number_of_item' => $val['item_size'],
                'item_purchase_price' => $val['item_purchase_price'],
                'item_selling_price' => $val['item_selling_price'],
            ];
            ItemPesananModel::createItemPesanan($item_pesanan);
        }

        if ($id_pesanan != null) {
            Session::forget('cart');
            Alert::success('Success', 'Data pesanan berhasil diperbarui');
            return redirect('/pesanan');
        } else {
            Alert::error('Error', 'Data pesanan gagal diperbarui');
            return redirect()->back();
        }
    }

    public function deletePesanan($id)
    {
        $pesanan = new PesananModel();
        $item = new ItemPesananModel();

        $delete_pesanan = $pesanan->deletePesanan($id);

        if ($delete_pesanan) {
            $item->deleteItemPesanan($id);
            Alert::success('Success', 'Data pesanan berhasil dihapus');
            return redirect('/pesanan');
        } else {
            Alert::error('Error', 'Data pesanan gagal dihapus');
            return redirect()->back();
        }
    }

    public function updateStatusPesanan($order_id, $status_id)
    {
        $pesanan = new PesananModel();
        $pesanan->updateStatusPesanan($order_id, $status_id);
        return response()->json(['message' => 'Status pesanan berhasil diperbarui'], 200);
    }

    public function getListBelanja()
    {
        $belanja = new PesananModel();
        $item_belanja = new ItemPesananModel();
        $id_pesanan = [];
        $tanggal_kirim = date('Y/m/d', strtotime(now()));

        $dt_belanja = $belanja->getListBelanja($tanggal_kirim);
        foreach ($dt_belanja as $dt) {
            array_push($id_pesanan, $dt->id);
        }

        $data = $item_belanja->getItemBelanja($id_pesanan);
        $sum_item = $item_belanja->getTotalItem($id_pesanan);

        // dd($data);
        return view('pages.belanja.BelanjaView', [
            'title' => 'Daftar Belanja',
            'active' => 'shop-item',
            'belanja' => $dt_belanja,
            'items' => $data,
            'list_item' => $sum_item,
        ]);
    }

    public function createInvoice($id)
    {
        $pesanan = new PesananModel();
        $item_pesanan = new ItemPesananModel();

        // Ambil data pesanan
        $detail_pesanan = $pesanan->getDetailPesanan($id);
        $items = $item_pesanan->getItemPesanan($id);

        // Ambil gambar
        $path = base_path('public/assets/img/logo_bostani.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pict = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = FacadePdf::loadView('pages.pesanan.InvoiceView', compact(['detail_pesanan', 'items', 'pict']));
        return $pdf->stream();
        // return $pdf->download('Invoice_'.$detail_pesanan->pelanggan->customer_name.'.pdf');
    }
}
