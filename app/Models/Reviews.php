<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'review', 'rating', 'is_approved'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function approve()
    {
        $this->approved = true;
        $this->save();
    }

    public function reject()
    {
        $this->approved = false;
        $this->save();
    }
}
