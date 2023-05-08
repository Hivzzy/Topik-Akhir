<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriModel::create([
            'category_name' => 'Ayam',
        ]);
        KategoriModel::create([
            'category_name' => 'Daging',
        ]);
        KategoriModel::create([
            'category_name' => 'Ikan & Seafood',
        ]);
        KategoriModel::create([
            'category_name' => 'Sayuran',
        ]);
        KategoriModel::create([
            'category_name' => 'Buah-buahan',
        ]);
        KategoriModel::create([
            'category_name' => 'Bumbu',
        ]);
        KategoriModel::create([
            'category_name' => 'Makanan Olahan',
        ]);
        KategoriModel::create([
            'category_name' => 'Sembako & Lain-lain',
        ]);
        KategoriModel::create([
            'category_name' => 'Paket Siap Masak',
        ]);
    }
}
