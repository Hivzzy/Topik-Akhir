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
        $drivers = DriversModel::all();
        return $drivers;
    }

    public function getDriver($id_driver)
    {
        $driver = DriversModel::where('id', $id_driver)->first();
        return $driver;
    }

    public function pengiriman()
    {
        return $this->hasMany(PengirimanModel::class);
    }

}

?>
