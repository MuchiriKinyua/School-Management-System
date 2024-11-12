<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport; 
use App\Exports\StudentExport; 
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function export(Request $request) 
    {   
        if($request->type == "xlsx"){
            $extension = "xlsx";
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        elseif($request->type == "csv"){
            $extension = "csv";
            $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        }
        elseif($request->type == "xls"){
            $extension = "xls";
            $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        }
        elseif ($request->type == "pdf") {
            $student = Student::all();
            $pdf = Pdf::loadView('students.export', compact('student'));
            $filename = 'students-' . date('d-m-Y') . '.pdf';
            return $pdf->download($filename);
        }
        else{
            $extension = "xlsx";
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        $filename = 'students-'.date('d-m-Y').'.'.$extension;
        return Excel::download(new StudentExport, $filename, $exportFormat);
    }
}
