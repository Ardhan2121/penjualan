<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sp extends Model
{
    use HasFactory;
    protected $table = "2122091_sp";
    protected $primaryKey = '2122091_NoSP';
    protected $keyType = 'string';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, '2122091_IdPelanggan', '2122091_IdPelanggan');
    }

    public function barangs(){
        return $this->belongsToMany(Barang::class, '2122091_detil_pesan', '2122091_NoSP', '2122091_KdBarang', '2122091_NoSP', '2122091_KdBarang')->withPivot('2122091_JmlJual', '2122091_HrgJual');
    }

    public function nota(){
        return $this->hasOne(Nota::class, '2122091_NoSP', '2122091_NoSP');
    }
}
