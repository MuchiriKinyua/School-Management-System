<?php

namespace App\Http\Controllers;

use App\Models\ParentStudentRelation;
use App\Models\Student;
use App\Models\ParentModel;  
use Illuminate\Http\Request;
use App\Imports\ParentStudentImport;
use App\Exports\ParentStudentExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ParentStudentController extends Controller
{
    public function store(Request $request)
    {
        // Store a new Parent-Student relation
        ParentStudentRelation::create([
            'adm_no' => $request->adm_no,
            'student_name' => $request->student_name,
            'class' => $request->class,
            'day_or_boarding' => $request->day_or_boarding,
            'parent_name' => $request->parent_name,
            'telephone' => $request->telephone,
            'stream' => $request->stream,
            'classteacher' => $request->classteacher,
            'status' => $request->status,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);
    }

    public function index()
    {
        // Retrieve all Parent-Student relations
        $relations = ParentStudentRelation::all();
        return view('parent_student.index', compact('relations'));
    }
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'import_file' => 'required|mimes:xlsx,csv,ods', // Only allow Excel or CSV files
        ]);

        // Get the file from the request
        $file = $request->file('import_file');

        // Import the data using the ParentStudentImport class
        try {
            // Perform the import
            Excel::import(new ParentStudentImport, $file);

            // Redirect back with success message
            return back()->with('status', 'Data imported successfully!');
        } catch (\Exception $e) {
            // Handle error in case of failure
            return back()->with('status', 'There was an error importing the data: ' . $e->getMessage());
        }
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
            $parentstudent = ParentStudentRelation::all();
            $pdf = Pdf::loadView('parent_student.export', compact('parentstudent'));
            $filename = 'parentstudent-' . date('d-m-Y') . '.pdf';
            return $pdf->download($filename);
        }
        else{
            $extension = "xlsx";
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        $filename = 'parentstudent-'.date('d-m-Y').'.'.$extension;
        return Excel::download(new ParentStudentExport, $filename, $exportFormat);
    }
}
