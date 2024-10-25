<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
    public function metode_layanan()
    {
        return $this->belongsTo(Metode_Layanan::class);
    }
}
