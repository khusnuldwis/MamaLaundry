<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
   // Di Model Transaksi
public function orderdetail()
{
    return $this->hasMany(Transaksi_Detail::class, 'transaksi_id');
}

public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
