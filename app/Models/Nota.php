<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = ['judul'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
