<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 't_user';
    protected $guarded = ['id'];

    public function getUser()
    {
        $user = UserModel::all();
        return $user;
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'id_role');
    }
}
