<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressBar extends Model
{
    protected $fillable = [
        'name',
        'value',
        'completed'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($progressBar) {
            $progressBar->completed = $progressBar->value >= 100;
        });
    }
}
