<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportError extends Model
{
    use HasFactory;

    protected $fillable = ['import_log_id', 'message', 'code'];

    public function importLog()
    {
        return $this->belongsTo(ImportLog::class);
    }
}
