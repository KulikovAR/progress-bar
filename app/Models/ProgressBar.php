<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressBar extends Model
{
    protected $fillable = [
        'name',
        'value',
        'completed',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($progressBar) {
            $progressBar->completed = $progressBar->value >= 100;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
