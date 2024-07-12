<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';
    protected $fillable = [
        'discount_percentage',
        'start_date',
        'end_date',
        'status'
    ];

    // one discount for one product
    public function products()
    {
        return $this->belongsToMany(product::class, 'discount_products');
    }

    public function isValid()
    {
        $currentDate = now();
        return $this->start_date <= $currentDate && $this->end_date >= $currentDate;
    }
}
