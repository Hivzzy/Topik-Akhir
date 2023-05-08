<?php

namespace Database\Seeders;

use App\Models\SubKategoriModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubKategoriModel::create([
            'category_id' => 1,
            'sub_category_name' => 'Daging Ayam'
        ]);
        SubKategoriModel::create([
            'category_id' => 1,
            'sub_category_name' => 'Jeroan Ayam'
        ]);
        SubKategoriModel::create([
            'category_id' => 1,
            'sub_category_name' => 'Fillet & Giling'
        ]);
        SubKategoriModel::create([
            'category_id' => 1,
            'sub_category_name' => 'Olahan Ayam'
        ]);
        SubKategoriModel::create([
            'category_id' => 1,
            'sub_category_name' => 'Telur'
        ]);
        SubKategoriModel::create([
            'category_id' => 2,
            'sub_category_name' => 'Daging Sapi'
        ]);
        SubKategoriModel::create([
            'category_id' => 2,
            'sub_category_name' => 'Daging Kambing'
        ]);
        SubKategoriModel::create([
            'category_id' => 3,
            'sub_category_name' => 'Ikan Segar'
        ]);
        SubKategoriModel::create([
            'category_id' => 3,
            'sub_category_name' => 'Pindang Ikan'
        ]);
        SubKategoriModel::create([
            'category_id' => 1,
            'sub_category_name' => 'Daging Ayam'
        ]);
        SubKategoriModel::create([
            'category_id' => 3,
            'sub_category_name' => 'Seafood Segar'
        ]);
        SubKategoriModel::create([
            'category_id' => 3,
            'sub_category_name' => 'Ikan Asin'
        ]);
        SubKategoriModel::create([
            'category_id' => 4,
            'sub_category_name' => 'Sayuran Organik'
        ]);
        SubKategoriModel::create([
            'category_id' => 6,
            'sub_category_name' => 'Bumbu Dapur'
        ]);
        SubKategoriModel::create([
            'category_id' => 6,
            'sub_category_name' => 'Bumbu Kemasan'
        ]);
        SubKategoriModel::create([
            'category_id' => 6,
            'sub_category_name' => 'Bumbu Giling'
        ]);
    }
}
