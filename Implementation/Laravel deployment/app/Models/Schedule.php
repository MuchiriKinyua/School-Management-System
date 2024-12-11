<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $table = 'schedules';

    public $fillable = [
        'day',
        'start_time',
        'end_time'
    ];

    protected $casts = [
        'day' => 'string'
    ];

    public static array $rules = [
        'day' => 'nullable|string|max:255',
        'start_time' => 'required',
        'end_time' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
