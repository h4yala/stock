<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
    'product_id',
    'type',
    'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

