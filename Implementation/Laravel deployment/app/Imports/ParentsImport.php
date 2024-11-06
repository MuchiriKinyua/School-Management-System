<?php

namespace App\Imports;

use App\Models\Parents; // Import the Parents model
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParentsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // Use updateOrCreate to update if the parent exists, or create if not
            Parents::updateOrCreate(
                ['adm_no' => $row['adm_no']], // Ensure 'Adm_No' matches the Excel column name
                [
                    'parent_name' => $row['parent_name'], // 'Parent_Name' should be 'Parent_No' in your case
                    'telephone' => $row['telephone'], // Ensure 'Telephone' matches the Excel column name
                ]
            );
        }
    }
}
