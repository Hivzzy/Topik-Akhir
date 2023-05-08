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
            'name' => 'Taufik Aditya',
            'username' => 'taufik_aditya',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 2,
            'name' => 'Habban Masykur Abdullah',
            'username' => 'habban_masykur',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 3,
            'name' => 'Yosua Lumbanraja',
            'username' => 'yosua_lumbanraja',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 4,
            'name' => 'Yoga Firmansyah',
            'username' => 'yoga_firmansyah',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'role_id' => 5,
            'name' => 'Adrianus Simarmata',
            'username' => 'adrianus_simarmata',
            'password' => bcrypt('password'),
        ]);
    }
}
