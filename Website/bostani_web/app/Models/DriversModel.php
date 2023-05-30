<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriversModel extends Model
{
    use HasFactory;

    protected $table = 'drivers';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function getDrivers()
    {
        $drivers = Drivers::all();
        return $pesanan;
    }

    public function getDriver($id_driver)
    {
        $driver = Drivers::where('id', $id_driver)->first();
        return $driver;
    }

    public function pengiriman()
    {
        return $this->hasMany(PengirimanModel::class);
    }

}

?>
