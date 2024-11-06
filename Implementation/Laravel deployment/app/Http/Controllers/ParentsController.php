<?php

namespace App\Http\Controllers;

use App\Imports\ParentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
}
