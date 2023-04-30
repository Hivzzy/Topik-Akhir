<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function displayRole()
    {
        $role = new RoleModel();
        $data = $role->getRole();

        return view('pages.user.RoleView', [
            'title' => 'Role User',
            'active' => 'user-account',
            'roles' => $data,
        ]);
    }
}
