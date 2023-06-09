<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create([
            'role_id' => 1,
            'name' => 'CEO',
            'username' => 'ceo',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 2,
            'name' => 'Head of Administration',
            'username' => 'administration',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 3,
            'name' => 'Head of Finance',
            'username' => 'finance',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 4,
            'name' => 'Head of Marketing',
            'username' => 'marketing',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 5,
            'name' => 'Head of Operation',
            'username' => 'operation',
            'password' => bcrypt('password'),
        ]);
    }
}
