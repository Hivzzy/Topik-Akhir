<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserConstroller extends Controller
{
    public function displayUser() {

        $user = new UserModel();
        $data = $user->getUser();

        // dd($data);

        return view('pages.user.UserView', [
            'title' => 'Akun User',
            'active' => 'user-account',
            'users' => $data,
        ]);
    }

    public function displayTambahUser() {
        return view('pages.user.TambahUserView', [
            'title' => 'Tambah User',
            'active' => 'user-account'
        ]);
    }

    public function displayEditUser($id) {
        return view('pages.user.EditUserView', [
            'title' => 'Edit User',
            'active' => 'user-account'
        ]);
    }
}
