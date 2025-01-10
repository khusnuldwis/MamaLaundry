<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Detail extends Model
{
    use HasFactory;

    protected $table = 'transaksi_details';

    protected $guarded = [];


    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
    public function durasi()
    {
        return $this->belongsTo(Durasi::class, 'durasi_id');
    }
    public function metode_layanan()
    {
        return $this->belongsTo(Metode_Layanan::class, 'metode_layanan_id');
    }
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
