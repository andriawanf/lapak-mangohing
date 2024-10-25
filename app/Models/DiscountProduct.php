<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount_id',
        'effective_date',
        'expiry_date',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
