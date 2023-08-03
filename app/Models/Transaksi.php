<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $fillable = ['deskripsi', 'jumlah'];

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }
}
