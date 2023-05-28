<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganModel extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getPelangganById($id)
    {
        $data = PelangganModel::join('urban_villages', 'customers.urban_village_id', '=', 'urban_villages.id')
            ->join('districts', 'urban_villages.district_id', '=', 'districts.id')
            ->join('cities', 'districts.city_id', '=', 'cities.id')
            ->select('customers.*', 'urban_villages.urban_village_name', 'districts.district_name', 'cities.city_name')
            ->where('customers.id', $id)
            ->get();
        return $data;
    }

    public function createPelanggan($pelanggan)
    {
        $add_pelanggan = PelangganModel::create([
            'urban_village_id' => $pelanggan['kelurahan'],
            'customer_name' => $pelanggan['nama_pelanggan'],
            'customer_phone' => $pelanggan['no_telepon'],
            'customer_address' => $pelanggan['alamat'],
        ]);

        return $add_pelanggan;
    }

    public function deletePelanggan($id_pelanggan)
    {
        $delete_pelanggan = PelangganModel::where('id', $id_pelanggan)->delete();
        return $delete_pelanggan;
    }

    public function updatePelanggan($pelanggan, $id)
    {
        $edit_pelanggan = PelangganModel::where('id', $id)->update(
            array(
                'urban_village_id' => $pelanggan['kelurahan'],
                'customer_name' => $pelanggan['nama_pelanggan'],
                'customer_phone' => $pelanggan['no_telepon'],
                'customer_address' => $pelanggan['alamat'],
            )
        );

        return $edit_pelanggan;
    }

    public function kelurahan()
    {
        return $this->belongsTo(KelurahanModel::class, 'urban_village_id');
    }

    public function pesanan()
    {
        return $this->hasMany(PesananModel::class);
    }
}
