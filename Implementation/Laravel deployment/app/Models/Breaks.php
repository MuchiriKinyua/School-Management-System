<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breaks extends Model
{
    public $table = 'breaks';

    public $fillable = [
        'name',
        'duration_minutes',
        'start_time',
        'end_time'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'duration_minutes' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
