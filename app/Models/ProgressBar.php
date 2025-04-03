<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressBar extends Model
{
    protected $fillable = [
        'name',
        'value',
    ];
}
