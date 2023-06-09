<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
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
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users|min:8|max:16',
            'email' => 'required|unique:users',
            'password' => [
                'required', 'max:16',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
                // ->uncompromised()   
            ],
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        $user = new UserModel();
        $add_user = $user->createUser($request->all());

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
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'role' => 'required',
            'username' => 'required|min:8|max:16',
            'email' => 'required',
            'password' => [
                'required', 'max:16',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
                // ->uncompromised()   
            ],
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        $user = new UserModel();
        $edit_user = $user->updateUser($request->all(), $id);

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
        $user = new UserModel();

        if ($id == auth()->user()->id) {
            Alert::error('Gagal', 'Tidak dapat menghapus user!');
            return redirect()->back();
        }

        $delete_user = $user->deleteUser($id);
        if ($delete_user) {
            Alert::success('Success', 'Data user berhasil dihapus');
            return redirect('/kelola-akun');
        } else {
            Alert::error('Error', 'Data user gagal dihapus');
            return redirect()->back();
        }
    }

    public function displayEditSelfUser()
    {
        $now_userid = Auth::user()->id;
        $now_userrole = Auth::user()->role_id;

        $user = new UserModel();
        $detail_user = $user->getDataUser($now_userid);

        $role = new RoleModel();
        $data_role = $role->getRole($now_userrole);

        return view('pages.user.EditSelfUserView', [
            'title' => 'Edit User',
            'active' => 'Self-Account',
            'user' => $detail_user,
            'roles' => $data_role,
        ]);
    }

    public function updateSelfUser(Request $request)
    {
        $now_userid = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'role' => 'required',
            'username' => 'required|min:8|max:16',
            'password' => [
                'required', 'max:16',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
                // ->uncompromised()   
            ],
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        $user = new UserModel();
        $edit_user = $user->updateUser($request->all(), $now_userid);

        if ($edit_user) {
            Alert::success('Success', 'Data user berhasil diperbarui');
            return redirect('/kelola-akun');
        } else {
            Alert::error('Error', 'Data user gagal diperbarui');
            return redirect()->back();
        }
    }
    
    
}
