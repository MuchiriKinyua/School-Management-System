<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Student; 
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // Convert the dob from DD/MM/YYYY to YYYY-MM-DD format
            $dob = \Carbon\Carbon::createFromFormat('d/m/Y', $row['dob'])->format('Y-m-d');
            
            // Log the converted dob to ensure it's being converted properly
            \Log::info("Converted dob: " . $dob);
    
            Student::updateOrCreate(
                ['adm_no' => $row['adm_no']], 
                [
                    'student_name' => $row['student_name'],  
                    'class' => $row['class'],        
                    'day_or_boarding' => $row['day_or_boarding'],        
                    'stream' => $row['stream'],        
                    'classteacher' => $row['classteacher'],        
                    'status' => $row['status'],        
                    'dob' => $dob,       
                    'gender' => $row['gender'], 
                ]
            );
        }
    }    
}