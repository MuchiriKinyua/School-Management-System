<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public $table = 'uploads';

    public $fillable = [
        'file_name'
    ];

    protected $casts = [
        'file_name' => 'string'
    ];

    public static array $rules = [
        'file_name' => 'required|string|max:255',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    
}
