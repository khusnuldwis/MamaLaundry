<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriLayanan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }
}
