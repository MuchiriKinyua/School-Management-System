<?php

namespace App\Http\Controllers;

use App\Imports\ParentsImport;
use App\Exports\ParentsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Parents;

class ParentsController extends Controller
{
    public function index()
    {
        $parents = Parents::all();
        return view('parents.index', compact('parents'));
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);
        Excel::import(new ParentsImport, $request->file('import_file'));

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
            $parents = Parents::all();
            $pdf = Pdf::loadView('parents.export', compact('parents'));
            $filename = 'parents-' . date('d-m-Y') . '.pdf';
            return $pdf->download($filename);
        }
        else{
            $extension = "xlsx";
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        $filename = 'parents-'.date('d-m-Y').'.'.$extension;
        return Excel::download(new ParentsExport, $filename, $exportFormat);
    }
}
