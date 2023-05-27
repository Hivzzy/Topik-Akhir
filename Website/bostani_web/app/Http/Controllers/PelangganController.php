<?php

namespace App\Http\Controllers;

use App\Models\KotaModel;
use App\Models\PelangganModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.pelanggan.PelangganView', [
            'title' => 'Data Pelanggan',
            'active' => 'customer',
            'customers' => PelangganModel::all(), 
        ]);
    }

    public function getPelangganById(Request $request)
    {
        $pelanggan = new PelangganModel();
        $data = $pelanggan->getPelangganById($request->id);
        // dd($data);
        return response()->json($data);
    }

    public function displayTambahPelanggan()
    {
        return view('pages.pelanggan.TambahPelangganView', [
            'title' => 'Tambah Pelanggan',
            'active' => 'customer',
            'cities' => KotaModel::all(),
        ]);
    }

    public function createPelanggan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required',
            'no_telepon' => 'required|min:10',
            'alamat' => 'required',
            'kelurahan' => 'required',
        ]);

        $pelanggan = new PelangganModel();
        $add_pelanggan = $pelanggan->createPelanggan($validatedData);

        if ($add_pelanggan) {
            Alert::success('Success', 'Data pelanggan berhasil ditambahkan');
            return redirect('/pelanggan');
        } else {
            Alert::error('Error', 'Data pelanggan gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function deletePelanggan($id_pelanggan)
    {

        $pelanggan = new PelangganModel();
        $delete_pelanggan = $pelanggan->deletePelanggan($id_pelanggan);

        if ($delete_pelanggan) {
            Alert::success('Success', 'Data pelanggan berhasil dihapus');
            return redirect('/pelanggan');
        } else {
            Alert::error('Error', 'Data pelanggan gagal dihapus');
            return redirect()->back();
        }
    }

    public function displayEditPelanggan($id)
    {
        return view('pages.pelanggan.EditPelangganView', [
            'title' => 'Edit Pelanggan',
            'active' => 'customer'
        ]);
    }
}
