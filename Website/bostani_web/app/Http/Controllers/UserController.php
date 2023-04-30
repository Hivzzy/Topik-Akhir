<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Hapus User!';
        $text = "Anda yakin ingin menghapus user?";
        confirmDelete($title, $text);

        $user = new UserModel();
        $data = $user->getUser();

        return view('pages.user.UserView', [
            'title' => 'Akun User',
            'active' => 'user-account',
            'users' => $data,
        ]);
    }

    public function displayTambahUser()
    {
        $role = new RoleModel();
        $data = $role->getRole();

        return view('pages.user.TambahUserView', [
            'title' => 'Tambah User',
            'active' => 'user-account',
            'roles' => $data,
        ]);
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'nama_user' => 'required',
            'role' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = new UserModel();
        $add_user = $user->createUser($validatedData);

        if ($add_user) {
            Alert::success('Success', 'User berhasil ditambahkan');
            return redirect('/kelola-akun');
        } else {
            Alert::error('Error', 'User gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function displayEditUser($id)
    {
        $user = new UserModel();
        $detail_user = $user->getDataUser($id);

        $role = new RoleModel();
        $data_role = $role->getRole();

        return view('pages.user.EditUserView', [
            'title' => 'Edit User',
            'active' => 'user-account',
            'user' => $detail_user,
            'roles' => $data_role,
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_user' => 'required',
            'role' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = new UserModel();
        $edit_user = $user->updateUser($validatedData, $id);

        if ($edit_user) {
            Alert::success('Success', 'Data user berhasil diperbarui');
            return redirect('/kelola-akun');
        } else {
            Alert::error('Error', 'Data user gagal diperbarui');
            return redirect()->back();
        }
    }

    public function deleteUser($id)
    {
        dd($id);
        // $user = new UserModel();
        // $delete_user = $user->deleteUser($id);

        // if ($delete_user) {
        //     Alert::success('Success', 'Data user berhasil dihapus');
        //     return redirect('/kelola-akun');
        // } else {
        //     Alert::error('Error', 'Data user gagal dihapus');
        //     return redirect()->back();
        // }
    }
}
