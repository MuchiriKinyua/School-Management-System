<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport; 

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); // Corrected model name
        return view('students.index', compact('students')); // Updated variable name
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);
        Excel::import(new StudentsImport, $request->file('import_file'));

        return redirect()->back()->with('status', 'Imported Successfully');
    }
}
