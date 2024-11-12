<?php

namespace App\Exports;
use App\Models\ParentStudentRelation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ParentStudentExport implements FromView
//FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return ParentStudentRelation::select('adm_no', 'student_name', 'class', 'day_or_boarding', 'parent_name', 'telephone', 'stream', 'classteacher', 'status', 'dob', 'gender',)->get();
    // }
    // public function headings(): array
    // {
    //     return [
    //         'Adm No',
    //         'Student Name',
    //         'Class',
    //         'Day or Boarding',
    //         'Parent Name',
    //         'Telephone',
    //         'Stream',
    //         'Class Teacher',
    //         'Status',
    //         'DOB',
    //         'Gender',
    //     ];
    // }
    public function view(): View
    {
        return view('parent_student.export', [
            'parentstudent' => ParentStudentRelation::all()
        ]);
    }
}
