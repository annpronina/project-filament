<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'api_url', 'status'];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function priceHistory()
    {
        return $this->hasMany(PriceHistory::class);
    }

    public function importLogs()
    {
        return $this->hasMany(ImportLog::class);
    }
}
