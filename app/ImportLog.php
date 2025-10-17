<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportLog extends Model
{
    protected $fillable = ['shop_id', 'file_type', 'imported_at', 'errors'];

    protected $casts = [
        'errors' => 'array',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
