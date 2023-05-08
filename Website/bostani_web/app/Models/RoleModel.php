<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getRole()
    {
        $role = RoleModel::all();
        return $role;
    }

    public function users() 
    {
        return $this->hasMany(UserModel::class);
    }
}
