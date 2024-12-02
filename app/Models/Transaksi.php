<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function details()
{
    return $this->hasMany(Transaksi_Detail::class, 'transaksi_id');
}
public function layanans()
    {
        return $this->belongsToMany(Layanan::class)
                    ->withPivot('quantity'); // Menyertakan kolom quantity
    }
}
