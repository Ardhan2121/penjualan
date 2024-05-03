<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nota extends Model
{
    protected $table = "2122091_nota";
    protected $primaryKey = '2122091_NoNota';
    protected $keyType = 'string';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function sp()
    {
        return $this->belongsTo(Sp::class, '2122091_NoSP', '2122091_NoSP');
    }
}
