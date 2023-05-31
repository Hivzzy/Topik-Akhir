<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\SubKategoriModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubKategoriController extends Controller
{
    public function index($id)
    {
        $title = 'Hapus Sub Kategori!';
        $text = "Anda yakin ingin menghapus sub kategori?";
        confirmDelete($title, $text);

        $sub_kategori = new SubKategoriModel();
        $data = $sub_kategori->getSubKategori($id);

        return view('pages.subkategori.SubKategoriView', [
            'title' => 'Data Sub Kategori',
            'active' => 'category',
            'category' => KategoriModel::where('id', $id)->first(),
            'sub_categories' => $data,
        ]);
    }

    public function getSubKategori($id_kategori)
    {
        $sub_kategori = new SubKategoriModel();
        
        if ($id_kategori != null) {
            $data = $sub_kategori->getSubKategori($id_kategori);
        } else {
            $data = '';
        }
        return json_encode($data);
    }

    public function testview(){
        return view ("pages.kategori.SubKategoriView");
    }

    public function createSubKategori(Request $request){
    
        $validatedData = $request->validate([
            'kategori_id' =>'required',
            'nama_sub_kategori' => 'required'
        ]);
        
        $sub_kategori = new SubKategoriModel();
        $data = $sub_kategori->createSubKategori($validatedData);
        if ($data){
            Alert::success('Success', 'Sub Kategori' . $validatedData['nama_sub_kategori'] . ' berhasil ditambahkan');
            return redirect('/subkategori/'.$validatedData['kategori_id']);
        }else {
            Alert::error('Error', 'Sub Kategori gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function updateSubKategori(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'nama_sub_kategori' => 'required',
        ]);

        $sub_kategori = new SubKategoriModel();
        $data = $sub_kategori->editSubKategori($validatedData, $id);

        if ($data) {
            Alert::success('Success', 'Kategori berhasil diperbarui');
            return redirect('/subkategori/'.$validatedData['kategori_id']);
        } else {
            Alert::error('Error', 'Kategori gagal diperbarui');
            return redirect()->back();
        }
    }

    public function deleteSubKategori($id)
    {
        $category_id = SubKategoriModel::find($id);
        $sub_kategori = new SubKategoriModel();
        $data = $sub_kategori->deleteSubKategori($id);


        if ($data) {
            Alert::success('Success', 'Kategori berhasil dihapus');
            return redirect('/subkategori/'.$category_id['category_id']);
        } else {
            Alert::error('Error', 'Kategori gagal dihapus');
            return redirect()->back();
        }
    }
}
