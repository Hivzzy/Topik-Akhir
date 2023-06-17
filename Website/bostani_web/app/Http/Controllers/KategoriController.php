<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Hapus Kategori!';
        $text = "Anda yakin ingin menghapus kategori?";
        confirmDelete($title, $text);

        return view('pages.kategori.KategoriView', [
            'title' => 'Data Kategori',
            'active' => 'category',
            'categories' => KategoriModel::all(),
        ]);
    }

    public function createKategori(Request $request)
    {

        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = new KategoriModel();
        $data = $kategori->createKategori($validatedData);

        if ($data) {
            Alert::success('Success', 'Kategori ' . $validatedData['nama_kategori'] . ' berhasil ditambahkan');
            return redirect('/kategori');
        } else {
            Alert::error('Error', 'Kategori gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function updateKategori(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = new KategoriModel();
        $data = $kategori->updateKategori($validatedData, $id);

        if ($data) {
            Alert::success('Success', 'Kategori berhasil diperbarui');
            return redirect('/kategori');
        } else {
            Alert::error('Error', 'Kategori gagal diperbarui');
            return redirect()->back();
        }
    }

    public function deleteKategori($id)
    {
        $kategori = new KategoriModel();
        $cek_subkategori = $kategori->listSubKategori($id);
        $cek_produk = $kategori->listProduk($id);

        // dd($cek_subkategori, $cek_produk);
        if ($cek_subkategori != [] || $cek_produk != []) {
            Alert::error('Gagal', 'Terdapat data sub kategori / data produk pada kategori');
            return redirect()->back();
        }

        $data = $kategori->deleteKategori($id);
        if ($data) {
            Alert::success('Success', 'Kategori berhasil dihapus');
            return redirect('/kategori');
        } else {
            Alert::error('Error', 'Kategori gagal dihapus');
            return redirect()->back();
        }
    }
}
