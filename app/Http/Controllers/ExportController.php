<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller 
{
    public function export() 
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}