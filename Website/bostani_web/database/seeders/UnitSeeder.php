<?php

namespace Database\Seeders;

use App\Models\UnitModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitModel::create([
            'unit_product_name' => 'Bongkol',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Bungkus',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Butir',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Ikat',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Kg',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Pack',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Paket',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Pasang',
        ]);
        UnitModel::create([
            'unit_product_name' => 'Tray',
        ]);
    }
}
