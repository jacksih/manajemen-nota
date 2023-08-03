<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'item_invoice')->withPivot(
            [
                'amount',
                'price',
                'id'
            ],
        );
    }
}
