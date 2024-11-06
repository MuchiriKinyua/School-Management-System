<?php

namespace App\Imports;

use App\Models\ParentStudentRelation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Carbon\Carbon;  

class ParentStudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $dob = isset($row['dob']) ? Carbon::createFromFormat('d/m/Y', $row['dob'])->format('Y-m-d') : null;

            ParentStudentRelation::updateOrCreate(
                ['adm_no' => $row['adm_no']], // Assuming 'adm_no' is a unique key
                [
                    'student_name' => $row['student_name'],
                    'class' => $row['class'],
                    'day_or_boarding' => $row['day_or_boarding'],
                    'parent_name' => $row['parent_name'],
                    'telephone' => $row['telephone'],
                    'stream' => $row['stream'],
                    'classteacher' => $row['classteacher'],
                    'status' => $row['status'],
                    'dob' => $dob, // Use the reformatted date
                    'gender' => $row['gender'],
                ]
            );
        }
    }
}
