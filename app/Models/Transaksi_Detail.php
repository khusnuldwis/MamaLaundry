<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Detail extends Model
{
    protected $table = 'transaksi_details'; // Explicitly set the table name
    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
    public function metode()
    {
        return $this->belongsTo(Metode_Layanan::class, 'metode_layanan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
