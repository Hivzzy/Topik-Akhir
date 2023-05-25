<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPesananModel extends Model
{
    use HasFactory;

    protected $table = 'order_status';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getStatusPesanan()
    {
        $statusPesanan = StatusPesananModel::all();
        return $statusPesanan;
    }

    public function getDetailStatusPesanan($id_status_pesanan)
    {
        $statusPesanan = StatusPesananModel::where('id', $id_status_pesanan)->first();
        return $statusPesanan;
    }

    public function pesanan()
    {
        return $this->hasMany(PesananModel::class);
    }
}
?>
