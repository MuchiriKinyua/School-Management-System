<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public $table = 'uploads';

    public $fillable = [
    ];

    protected $casts = [
    ];

    public static array $rules = [
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    
}
