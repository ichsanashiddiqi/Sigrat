<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pemberi;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Route;

class LaporanPegawaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $petugasWithoutLaporan = Petugas::query()
            ->leftJoin('laporan', 'id', 'petugas_id')
            ->where('user_id', $user->id)
            ->whereNull('petugas_id')
            ->get();

        $reqId = Route::input('id');
//        $pemberi = Pemberi::with('laporan')->get();

//        return $pemberi;
        // return $petugasWithoutLaporan;
        return view('pages.pegawai.laporan.index',[
            // 'data' => $petugasWithoutLaporan,
            'pemberi' => Pemberi::all(),
            'id' => $reqId,
        ]);
    }
    public function store(Request $request){

        $user = Auth::user();
        $request->validate([
            // 'inbox' => 'string|max:150|required',
            'id' => 'required',
            'jenis' => ['required'],
            'bentuk' => ['required'],
            'golongan' => ['nullable'],
            'nilai' => ['required','numeric'],
            'tanggal' => ['required'],
            'lokasi' => ['required'],
            'pemberi_lama' => ['nullable'],
            'nama' => ['nullable'],
            'alamat' => ['nullable'],
            'notelp' => ['nullable'],
            'hubungan' => ['required'],
            'waktu' => ['nullable'],
            'foto' => ['nullable'],
        ]);
        // $img_path = 'storage/images';

        $laporan = new Laporan;
        $laporan->petugas_id = $request->id;
        $laporan->jenis_gratifikasi = $request->jenis;
        $laporan->bentuk_gratifikasi = $request->bentuk;
        $laporan->golongan = $request->golongan;
        $laporan->nilai_equivalent = $request->nilai;
        $laporan->tanggal_pemberian = $request->tanggal;
        $laporan->tempat = $request->lokasi;
        $laporan->hubungan_pemberi = $request->hubungan;
        $laporan->waktu_pelaksanaan = $request->waktu;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $request->lokasi. '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/laporan/images'), $fileName);
            $laporan->foto = $fileName;
        };
        
        if ($request->pemberi_lama){
            $laporan->pemberi_gratifikasi_id = $request->pemberi_lama;
            $laporan->save();
        }else{

            $pemberi = new Pemberi;
            $pemberi->nama = $request->nama;
            $pemberi->alamat = $request->alamat;
            $pemberi->telepon = $request->notelp;
            $pemberi->save();
            $laporan->pemberi_gratifikasi_id = $pemberi->id;
            $laporan->save();
        }

        return redirect()->route('laporanTabel')->with('success', 'Data pelaporan berhasil ditambahkan');
    }
}
