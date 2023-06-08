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
            'role_id' => 4,
            'name' => 'asep',
            'email' => 'asep@gmail.com',
            'username' => 'asep',
            'password' => bcrypt('password'),
        ]);
    }
}
