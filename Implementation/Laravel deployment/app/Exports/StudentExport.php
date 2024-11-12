<?php

namespace App\Exports;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentExport implements FromView
//FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Student::select('ID', 'adm_no', 'student_name', 'class', 'day_or_boarding', 'stream', 'classteacher', 'status', 'dob', 'gender',)->get();
    // }
    // public function headings(): array
    // {
    //     return [
    //         'ID',
    //         'Adm No',
    //         'Student Name',
    //         'Class',
    //         'Day or Boarding',
    //         'Stream',
    //         'Class Teacher',
    //         'Status',
    //         'DOB',
    //         'Gender',
    //     ];
    // }
    public function view(): View
    {
        return view('students.export', [
            'student' => Student::all()
        ]);
    }
}
