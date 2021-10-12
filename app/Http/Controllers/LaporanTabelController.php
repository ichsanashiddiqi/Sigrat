<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanTabelController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $petugas = Petugas::with(['user', 'suratTugas', 'laporan'])
            ->where('user_id', $user->id)
            ->get();
        // $petugas = Petugas::query()
        //     ->join('laporan', 'id', 'petugas_id', 'inner')
        //     ->where('user_id', $user->id)
        //     ->get();

        return view('pages.pegawai.laporan.table',[
            'data' => $petugas,
        ]);
    }
}
