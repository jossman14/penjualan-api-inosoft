<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Parental\HasChildren;

class Kendaraan extends Model
{
    use HasFactory, HasChildren;

    protected $table = "kendaraan";

    protected $fillable  = [ 'tahun_keluaran', 'warna', 'harga', 'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kapasitas_penumpang', 'tipe_mobil', "type", 'stok', 'penjualan'];

    protected $childTypes = [
        'mobil' => Mobil::class,
        'motor' => Motor::class,
    ];
}
