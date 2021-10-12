<?php

namespace App\Exports;

use App\Models\Petugas;
use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    
    public function view(): View
    {
        
        return view('pages.admin.laporan.export', [
            'data' => Petugas::with('user', 'laporan.pemberi')->get()
        ]);
    }
}
