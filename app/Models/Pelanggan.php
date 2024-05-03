<?php

namespace App\Models;

use App\Models\Sp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "2122091_pelanggan";
    protected $primaryKey = '2122091_IdPelanggan';
    protected $keyType = 'string';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function sp(){
        return $this->hasMany(Sp::class, '2122091_IdPelanggan', '2122091_IdPelanggan');
    }

}
