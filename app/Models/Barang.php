<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "2122091_barang";
    protected $primaryKey = '2122091_KdBarang';
    protected $keyType = 'string';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function sps(){
        return $this->belongsToMany(Sp::class, '2122091_detil_pesan', '2122091_barang', '2122091_NoSP', '2122091_barang', '2122091_NoSP')->withPivot('2122091_JmlJual', '2122091_HrgJual');
    }
}
