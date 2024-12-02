<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(CategoriLayanan::class);
    }
    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class)
                    ->withPivot('quantity'); // Menyertakan kolom quantity
    }
   
}
