<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserConstroller extends Controller
{
    public function displayUser() {
        return view('pages.user.UserView', [
            'title' => 'Akun User',
            'active' => 'user-account'
        ]);
    }

    public function displayTambahUser() {
        return view('pages.user.TambahUserView', [
            'title' => 'Tambah User',
            'active' => 'user-account'
        ]);
    }
}
