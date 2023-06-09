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
        // UserModel::create([
        //     'role_id' => 2,
        //     'name' => 'Habban Masykur Abdullah',
        //     'email' => 'habbanma@gmail.com',
        //     'username' => 'habban_masykur',
        //     'password' => bcrypt('password'),
        // ]);
        UserModel::create([
            'role_id' => 1,
            'name' => 'CEO',
            'email' => 'adrianus.simarmata.tif20@polban.ac.id',
            'username' => 'ceo',
            'password' => bcrypt('password'),
        ]);
        // UserModel::create([
        //     'role_id' => 2,
        //     'name' => 'Head of Administration',
        //     'email' => 'habban.masykur.tif20@polban.ac.id',
        //     'username' => 'administration',
        //     'password' => bcrypt('password'),
        // ]);
        // UserModel::create([
        //     'role_id' => 3,
        //     'name' => 'Head of Finance',
        //     'email' => 'habban.masykur.tif20@polban.ac.id',
        //     'username' => 'finance',
        //     'password' => bcrypt('password'),
        // ]);
        // UserModel::create([
        //     'role_id' => 4,
        //     'name' => 'Head of Marketing',
        //     'email' => 'habban.masykur.tif20@polban.ac.id',
        //     'username' => 'marketing',
        //     'password' => bcrypt('password'),
        // ]);
        // UserModel::create([
        //     'role_id' => 5,
        //     'name' => 'Head of Operation',
        //     'email' => 'habban.masykur.tif20@polban.ac.id',
        //     'username' => 'operation',
        //     'password' => bcrypt('password'),
        // ]);
    }
}
