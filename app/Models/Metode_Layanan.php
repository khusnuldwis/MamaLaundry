<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode_Layanan extends Model
{
    use HasFactory;
    protected $table = 'metode_layanans';
    protected $guarded = [];
    public function orderdetail() {
        return $this->hasMany(Transaksi_Detail::class);
    }
}
