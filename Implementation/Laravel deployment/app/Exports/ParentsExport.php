<?php

namespace App\Exports;
use App\Models\Parents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ParentsExport implements FromView
//FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Parents::select('ID', 'adm_no', 'parent_name', 'telephone',)->get();
    // }
    // public function headings(): array
    // {
    //     return [
    //         'ID',
    //         'Adm No',
    //         'Parent Name',
    //         'Telephone',
    //     ];
    // }
    public function view(): View
    {
        return view('parents.export', [
            'parents' => Parents::all()
        ]);
    }
}
