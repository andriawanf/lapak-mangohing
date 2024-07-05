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
    protected $primaryKey = 'discount_id';
    protected $fillable = [
        'discount_percentage',
        'minimum_order',
        'start_date',
        'end_date',
        'product_id'
    ];

    // one discount for one product
    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function isValid()
    {
        $currentDate = now();
        return $this->start_date <= $currentDate && $this->end_date >= $currentDate;
    }
}
