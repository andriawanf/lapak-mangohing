<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'order_id',
        'user_id',
        'payment_status',
        'price',
        'product_name',
        'customer_name',
        'customer_email',
        // 'payment_method',
        'payment_link',
    ];

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
