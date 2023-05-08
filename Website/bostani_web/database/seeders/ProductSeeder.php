<?php

namespace Database\Seeders;

use App\Models\ProdukModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProdukModel::create([
            'category_id' => 1,
            'sub_category_id' => 1,
            'unit_id' => 5,
            'product_name' => 'Ayam Broiler',
            'product_size' => 1,
            'product_purchase_price' => 45000,
            'product_selling_price' => 53000,
        ]);

        ProdukModel::create([
            'category_id' => 1,
            'sub_category_id' => 2,
            'unit_id' => 8,
            'product_name' => 'Ati Ampela',
            'product_size' => 1,
            'product_purchase_price' => 2200,
            'product_selling_price' => 3750,
        ]);
        
        ProdukModel::create([
            'category_id' => 1,
            'sub_category_id' => 3,
            'unit_id' => 5,
            'product_name' => 'Ayam Fillet Dada',
            'product_size' => 1,
            'product_purchase_price' => 47000,
            'product_selling_price' => 63000,
        ]);

        ProdukModel::create([
            'category_id' => 2,
            'sub_category_id' => 6,
            'unit_id' => 5,
            'product_name' => 'Ati Sapi',
            'product_size' => 1,
            'product_purchase_price' => 60000,
            'product_selling_price' => 80000,
        ]);;

        ProdukModel::create([
            'category_id' => 4,
            'sub_category_id' => null,
            'unit_id' => 4,
            'product_name' => 'Bayam',
            'product_size' => 1,
            'product_purchase_price' => 4500,
            'product_selling_price' => 2500,
        ]);

        ProdukModel::create([
            'category_id' => 5,
            'sub_category_id' => null,
            'unit_id' => 5,
            'product_name' => 'Alpukat Mentega',
            'product_size' => 1,
            'product_purchase_price' => 35000,
            'product_selling_price' => 47500,
        ]);

        ProdukModel::create([
            'category_id' => 6,
            'sub_category_id' => 15,
            'unit_id' => 2,
            'product_name' => 'Bumbu Racik Ayam Goreng',
            'product_size' => 1,
            'product_purchase_price' => 2000,
            'product_selling_price' => 3000,
        ]);

        ProdukModel::create([
            'category_id' => 6,
            'sub_category_id' => 15,
            'unit_id' => 2,
            'product_name' => 'Bumbu Racik Ikan Goreng',
            'product_size' => 1,
            'product_purchase_price' => 4000,
            'product_selling_price' => 4500,
        ]);
    }
}
