<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public $table = 'polls';

    public $fillable = [
        'choice',
        'answer'
    ];

    protected $casts = [
        'choice' => 'string',
        'answer' => 'string'
    ];

    public static array $rules = [
        'choice' => 'required|string|max:255',
        'answer' => 'required|string|max:65535',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    
}
