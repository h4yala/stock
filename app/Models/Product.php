<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
    ];

    public function movements()
    {
        return $this->hasMany(StockMovement::class);
    }
}

