<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use App\Models\DriversModel;
use App\Models\PesananModel;
use App\Models\PelangganModel;
use App\Models\StatusPengirimanModel;
use App\Models\ItemPesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class PengirimanController extends Controller
{
    public function index()
    {
        if (Session::get('order_list') != []) {
            Session::forget('order_list');
        }
        $title = 'Hapus data Pengiriman!';
        $text = "Anda yakin ingin menghapus data pengiriman?";
        confirmDelete($title, $text);

        $pengiriman = new PengirimanModel();
        $pengirimans = PengirimanModel::with('pesanans')->get();
        $jumlahTotalOngkir = PengirimanModel::with(['pesanans' => function ($query) {
            $query->select('delivery_id', DB::raw('SUM(shipping_cost) as total_shipping_cost'))
                ->groupBy('delivery_id');
        }])
        ->get();

        $query = " SELECT delivery_id, COUNT(*) AS list_count FROM orders GROUP BY delivery_id ";
        $results = DB::select($query);
        $itemCounts = [];
        foreach ($results as $result) {
            $itemCounts[$result->delivery_id] = $result->list_count;
        }


        return view('pages.pengiriman.PengirimanView', [
            'title' => 'Data Pengiriman',
            'active' => 'deliveries',
            'pengirimans' => $pengirimans,
            'jumlahList' => $itemCounts,
            'jumlahOngkir' => $jumlahTotalOngkir,
        ]);
    }

    public function getDetailPengiriman($id_pengiriman)
    {
        $detail_pengiriman = new PengirimanModel();
        $jumlahTotalOngkir = PengirimanModel::with(['pesanans' => function ($query) {
            $query->select('delivery_id', DB::raw('SUM(shipping_cost) as total_shipping_cost'))
                ->groupBy('delivery_id');
        }])
        ->find($id_pengiriman);


        return view('pages.pengiriman.DetailPengirimanView', [
            'title' => 'Detail Pengiriman',
            'active' => 'deliveries',
            'detail_pengiriman' => $detail_pengiriman->getDetailPengiriman($id_pengiriman),
            'jumlahTotalOngkir'=>$jumlahTotalOngkir,
            'delivery_status' => StatusPengirimanModel::all(),
        ]);
    }

    public function displayTambahPengiriman()
    {
        $orders = PesananModel::where('order_status_id', 2)->where('delivery_id', null)->get();
        $query = " SELECT order_id, COUNT(*) AS item_count FROM order_items GROUP BY order_id ";
        $results = DB::select($query);
        $itemCounts = [];

        foreach ($results as $result) {
            $itemCounts[$result->order_id] = $result->item_count;
        }
        return view('pages.pengiriman.TambahPengirimanView', [
            'title' => 'Tambah Pengiriman',
            'active' => 'deliveries',
            'jumlahItem' => $itemCounts,
            'pesanans' => $orders,
        ]);
    }
    public function displayTambahDetailPengiriman()
    {
        $order_list = Session::get('order_list', []);
        $orders = PesananModel::where('order_status_id', 2)->get();
        $query = " SELECT order_id, COUNT(*) AS item_count FROM order_items GROUP BY order_id ";
        $results = DB::select($query);
        $itemCounts = [];

        foreach ($results as $result) {
            $itemCounts[$result->order_id] = $result->item_count;
        }
        return view('pages.pengiriman.TambahDetailPengiriman', [
            'title' => 'Tambah Pengiriman',
            'active' => 'deliveries',
            'jumlahItem' => $itemCounts,
            'pesanans' => $orders,
            'order_list' => $order_list,
        ]);
    }
    public function createListPesanan(Request $request)
    {

        $pesanan = PesananModel::find($request->order_id);
        // if (!$pesanan) {
        //     return response()->json(['message' => 'Data pesanan tidak ditemukan'], 404);
        // }
        $order_list = Session()->get('order_list', []);
        $order_list[$pesanan->id] = [
            'order_id' => $pesanan->id,
            'customer_name'=>$pesanan->customers->customer_name,
            'alamat'=>$pesanan->customers->customer_address,
            'kelurahan'=> $pesanan->customers->kelurahan->urban_village_name,
            'kecamatan'=> $pesanan->customers->kelurahan->kecamatan->district_name,
            'kota'=>$pesanan->customers->kelurahan->kecamatan->kota->city_name,
        ];

        Session::put('order_list', $order_list);
    }

    public function showListPesanan()
    {
        $order_list = Session::get('order_list', []);
        return view('pages.pengiriman.ListPengirimanView')->with([
            'data' => $order_list
        ]);
    }

    public function showDataPesanan()
    {
        $order_list = Session::get('order_list', []);
        $orders = PesananModel::where('order_status_id', 2)->where('delivery_id', null)->get();
        $query = " SELECT order_id, COUNT(*) AS item_count FROM order_items GROUP BY order_id ";
        $results = DB::select($query);
        $itemCounts = [];

        foreach ($results as $result) {
            $itemCounts[$result->order_id] = $result->item_count;
        }
        return view('pages.pengiriman.DataPengirimanView')->with([
            'jumlahItem' => $itemCounts,
            'pesanans' => $orders,
            'order_list' => $order_list,
        ]);
    }

    public function deleteListCart($id)
    {
        // Hapus item pesanan sebelumnya
        $pesanans = new PesananModel();
        $pesanans->deletePengiriman($id);

        $order_list = Session::get('order_list', []);
        unset($order_list[$id]);
        Session::put('order_list', $order_list);
    }

    public function deleteAllList()
    {
        if (Session::get('order_list') != []) {
            Session::forget('order_list');
            return response()->json(['message' => 'List pesanan berhasil dihapus!'], 200);
        } else {
            return response()->json(['message' => 'List pesanan sudah kosong!'], 400);
        }
    }

    public function getList($list)
    {
        $order_list = Session::get('order_list', []);
        foreach ($items as $item) {
            $order_list[$item->product_id] = [
                'order_id' => $item->order_id,
            ];
            Session::put('order_list', $order_list);
        }
    }

    public function createPengiriman(Request $request){

        $validator = Validator::make($request->all(), [
            'delivery_group_name' => 'required',
            'driver_type' => 'required',
        ]);

         // Mengecek inputan tidak sesuai
         if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput($request->all());
        }

        // Mengecek item pesanan
        if (Session::get('order_list') == []) {
            toast('Harap isi list pesanan!', 'error');
            return redirect()->back()->withInput($request->all());
        }

        $pengiriman = new PengirimanModel();
        $id_pengiriman = $pengiriman->createPengiriman($request->all());

        $order_list = Session::get('order_list', []);
        $keys = array_keys($order_list);
        foreach ($keys as $key) {
            $list = [
                'delivery_id' => $id_pengiriman->id,
            ];
            PesananModel::updateStatusPengiriman($key, $list);
        }
        if ($id_pengiriman != null) {
            Session::forget('order_list');
            Alert::success('Success', 'List Pengiriman berhasil ditambahkan');
            return redirect('/pengiriman');
        } else {
            Alert::error('Error', 'List Pengirima gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function displayEditPengiriman($id){
        if (Session::get('order_list') != []) {
            Session::forget('order_list');
        }

        $pengiriman = PengirimanModel::find($id);
        $pesanans = PesananModel::where('delivery_id', $pengiriman->id)->get();
        PengirimanController::getListPesanan($pesanans);

        $orders = PesananModel::where('order_status_id', 2)->where('delivery_id', null)->get();
        $query = " SELECT order_id, COUNT(*) AS item_count FROM order_items GROUP BY order_id ";
        $results = DB::select($query);
        $itemCounts = [];


        foreach ($results as $result) {
            $itemCounts[$result->order_id] = $result->item_count;
        }

        return view('pages.pengiriman.EditPengirimanView', [
            'title' => 'Edit Pengiriman',
            'active' => 'delivery',
            'pesanans' => $orders,
            'jumlahItem' => $itemCounts,
            'data' => $pesanans,
            // 'customers' => PelangganModel::all(),
            // 'cities' => KotaModel::all(),
            // 'products' => ProdukModel::all(),
            'pengirimans' => $pengiriman,
        ]);
    }

    public function displayEditDetailPengiriman($id){
        $pengiriman =  PengirimanModel::find($id);

        return view('pages.pengiriman.EditDetailPengirimanView', [
            'title' => 'Edit Pengiriman',
            'active' => 'delivery',
            // 'customers' => PelangganModel::all(),
            // 'cities' => KotaModel::all(),
            // 'products' => ProdukModel::all(),
            'pengirimans' => $pengiriman,
        ]);
    }

    public function getListPesanan($pesanans){
        $order_list = Session::get('order_list', []);
        foreach ($pesanans as $pesanan) {
            $order_list[$pesanan->id] = [
            'order_id' => $pesanan->id,
            'customer_name'=>$pesanan->customers->customer_name,
            'alamat'=>$pesanan->customers->customer_address,
            'kelurahan'=> $pesanan->customers->kelurahan->urban_village_name,
            'kecamatan'=> $pesanan->customers->kelurahan->kecamatan->district_name,
            'kota'=>$pesanan->customers->kelurahan->kecamatan->kota->city_name,
            ];
            Session::put('order_list', $order_list);

        }

    }

    public function updatePengiriman(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'delivery_group_name' => 'required',
            'driver_type' => 'required',
        ]);

        // Mengecek inputan tidak sesuai
        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput($request->all());
        }

        // Mengecek item pesanan
        if (Session::get('order_list') == []) {
            toast('Harap isi item pesanan!', 'error');
            return redirect()->back()->withInput($request->all());
        }

        // Hapus item pesanan sebelumnya
        $pesanans = new PesananModel();
        $pesanans->deletePengiriman($id);

        // Insert item pesanan baru
        $pengiriman = new PengirimanModel();
        $pengiriman->deletePengiriman($id);
        $id_pengiriman = $pengiriman->createPengiriman($request->all());

        $order_list = Session::get('order_list', []);
        $keys = array_keys($order_list);
        foreach ($keys as $key) {
            $list = [
                'delivery_id' => $id_pengiriman->id,
            ];
            PesananModel::updateStatusPengiriman($key, $list);
        }

        if ($id_pengiriman != null) {
            Session::forget('order_list');
            Alert::success('Success', 'List Pengiriman berhasil ditambahkan');
            return redirect('/pengiriman');
        } else {
            Alert::error('Error', 'List Pengirima gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function deleteDataPengiriman($id){
        $pengiriman = new PengirimanModel();
        $item = new PesananModel();

        $delete_pengiriman = $pengiriman->deleteDataPengiriman($id);

        if ($delete_pengiriman) {
            $item->deletePengiriman($id);
            Alert::success('Success', 'Data pesanan berhasil dihapus');
            return redirect('/pengiriman');
        } else {
            Alert::error('Error', 'Data pesanan gagal dihapus');
            return redirect()->back();
        }
    }

    public function updateStatusPengiriman($delivery_id, $delivery_status_id)
    {
        $pengiriman = new PengirimanModel();
        $pengiriman->updateStatusPengiriman($delivery_id, $delivery_status_id);
        return response()->json(['message' => 'Status Pengiriman berhasil diperbarui'], 200);
    }

    public function createPengirimanPDF(){
        $pengirimans = new PengirimanModel();
        $pesanans = new PesananModel();

        $data_pengirimans = PengirimanModel::with('pesanans')->get();

        $query = " SELECT order_id, COUNT(*) AS item_count FROM order_items GROUP BY order_id ";
        $results = DB::select($query);
        $itemCounts = [];

        foreach ($results as $result) {
            $itemCounts[$result->order_id] = $result->item_count;
        }

        $pdf = Pdf::loadView('pages.pengiriman.ExportGroupPengiriman', compact(['data_pengirimans', 'itemCounts']))->setPaper('a4', 'landscape');
        return $pdf->stream('Group Pengiriman.pdf');
    }
}
?>
