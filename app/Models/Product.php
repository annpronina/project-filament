<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'brand', 'model', 'ean', 'category', 'attributes'];

    protected $casts = [
        'attributes' => 'array',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function priceHistory()
    {
        return $this->hasMany(PriceHistory::class);
    }
}

