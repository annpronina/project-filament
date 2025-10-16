<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportLog extends Model
{
    protected $fillable = [
        'source',
        'imported_at',
        'total_records',
        'errors_count',
    ];

    public $timestamps = false;
}
