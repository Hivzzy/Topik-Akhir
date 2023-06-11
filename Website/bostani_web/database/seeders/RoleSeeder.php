<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleModel::create([
            'role_name' => 'CEO',
        ]);
        RoleModel::create([
            'role_name' => 'Head of Administration',
        ]);
        RoleModel::create([
            'role_name' => 'Head of Finance',
        ]);
        RoleModel::create([
            'role_name' => 'Head of Marketing',
        ]);
        RoleModel::create([
            'role_name' => 'Head of Operation',
        ]);
    }
}
