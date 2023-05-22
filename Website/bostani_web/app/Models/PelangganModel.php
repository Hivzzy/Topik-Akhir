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

    public function kelurahan()
    {
        return $this->belongsTo(KelurahanModel::class, 'urban_village_id');
    }

    public function pesanan()
    {
        return $this->hasMany(PesananModel::class);
    }
}
