<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
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
        $add_user = UserModel::create([
            'role_id' => $user['role'],
            'name' => $user['nama_user'],
            'username' => $user['username'],
            'password' => bcrypt($user['password']),
        ]);

        return $add_user;
    }

    public function updateUser($user, $id_user)
    {
        $edit_user = UserModel::where('id', $id_user)->update(
            array(
                'role_id' => $user['role'],
                'name' => $user['nama_user'],
                'username' => $user['username'],
                'password' => bcrypt($user['password']),
            )
        );

        return $edit_user;
    }

    public function updateUserForget($username, $data)
    {
        $edit_user = UserModel::where('username', $username)->update(
            array(
                'password' => bcrypt($data),
            )
        );

        return $edit_user;
    }

    public function deleteUser($id_user)
    {
        $delete_user = UserModel::where('id', $id_user)->delete();
        return $delete_user;
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id');
    }

    public function orders()
    {
        return $this->hasMany(PesananModel::class);
    }
}
