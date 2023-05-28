<?php

namespace App\Http\Controllers;

use App\Models\KotaModel;
use App\Models\PelangganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    public function index()
    {
        $title = 'Hapus User!';
        $text = "Anda yakin ingin menghapus data pelanggan?";
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
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'no_telepon' => 'required|min:10',
            'alamat' => 'required',
            'kelurahan' => 'required',
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        $pelanggan = new PelangganModel();
        $add_pelanggan = $pelanggan->createPelanggan($request->all());

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
            'active' => 'customer',
            'customer' => PelangganModel::firstWhere('id', $id),
            'cities' => KotaModel::all(),
        ]);
    }

    public function updatePelanggan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'no_telepon' => 'required|min:10',
            'alamat' => 'required',
            'kelurahan' => 'required',
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        $pelanggan = new PelangganModel();
        $edit_pelanggan = $pelanggan->updatePelanggan($request->all(), $id);

        if ($edit_pelanggan) {
            Alert::success('Success', 'Data pelanggan berhasil diperbarui');
            return redirect('/pelanggan');
        } else {
            Alert::error('Error', 'Data pelanggan gagal diperbarui');
            return redirect()->back();
        }

    }
}
