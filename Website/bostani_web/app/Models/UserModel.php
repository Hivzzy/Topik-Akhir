<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getUser()
    {
        $user = UserModel::all();
        return $user;
    }

    public function getDataUser($id_user)
    {
        $data_user = UserModel::where('id', $id_user)->first();
        return $data_user;
    }

    public function createUser($user)
    {
        $add_user = DB::table('t_user')->insert(
            array(
                'id_role' => $user['role'],
                'nama_user' => $user['nama_user'],
                'username' => $user['username'],
                'password' => bcrypt($user['password']),
            )
        );

        return $add_user;
    }

    public function updateUser($user, $id_user)
    {
        $edit_user = DB::table('t_user')->where('id', $id_user)->update(
            array(
                'id_role' => $user['role'],
                'nama_user' => $user['nama_user'],
                'username' => $user['username'],
                'password' => bcrypt($user['password']),
            )
        );

        return $edit_user;
    }

    public function deleteUser($id_user)
    {
        $delete_user = DB::table('t_user')->where('id', $id_user)->delete();
        return $delete_user;
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id');
    }
}
