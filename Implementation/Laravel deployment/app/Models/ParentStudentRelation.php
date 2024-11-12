<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStudentRelation extends Model
{
    use HasFactory;

    // Define the table name if it's not the default 'parent_student_relations'
    protected $table = 'parent_student_relations'; // Change to your actual table name

    // Define the fillable columns for mass assignment
    protected $fillable = [
        'adm_no',
        'student_name',
        'class',
        'day_or_boarding',
        'parent_name',
        'telephone',
        'stream',
        'classteacher',
        'status',
        'dob',
        'gender'
    ];
}

