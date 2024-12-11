<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $table = 'teachers';

    public $fillable = [
        'first_name',
        'surname',
        'title',
        'email',
        'phone_number',
        'id_number',
        'tsc_number',
        'status'
    ];

    protected $casts = [
        'first_name' => 'string',
        'surname' => 'string',
        'title' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'tsc_number' => 'string',
        'status' => 'boolean'
    ];

    public static array $rules = [
        'first_name' => 'required|string|max:191',
        'surname' => 'nullable|string|max:191',
        'title' => 'required|string|max:191',
        'email' => 'required|string|max:191',
        'phone_number' => 'required|string|max:191',
        'id_number' => 'required',
        'tsc_number' => 'nullable|string|max:191',
        'status' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
