<?php

namespace App\Http\Controllers;

use App\Models\Outbox;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::with(['user', 'suratTugas', 'laporan'])->get();
        $karyawanNganggur = User::pegawaiNganggur()->get();

        return view('pages.admin.petugas.index', [
            'data' => $petugas,
            'outbox' => Outbox::all(),
            'user' =>  User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'inbox' => 'string|max:150|required',
            'surat_tugas' => ['required'],
            'pegawai' => ['required'],
        ]);
        // $img_path = 'storage/images';

        $petugas = new Petugas;
        $petugas->user_id = $request->pegawai;
        $petugas->surat_tugas_id = $request->surat_tugas;
        $petugas->save();

        return redirect()->route('petugas.index')->with('success', 'Data Petugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        $karyawanNganggur = User::pegawaiNganggur()->get();
        return view('pages.admin.petugas.update', [
            'data' => $petugas,
            'user' =>  Outbox::all(),
            'outbox' => Outbox::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);
        $request->validate([
            // 'inbox' => 'string|max:150|required',
            'surat_tugas' => ['required'],
            'pegawai' => ['required'],
        ]);
        // $img_path = 'storage/images';

        $petugas = new Petugas;
        $petugas->user_id = $request->pegawai;
        $petugas->surat_tugas_id = $request->surat_tugas;
        $petugas->save();

        return redirect()->route('petugas.index')->with('success', 'Data Petugas berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index')
            ->with('success', 'Data petugas berhasil dihapus');
    }
}
