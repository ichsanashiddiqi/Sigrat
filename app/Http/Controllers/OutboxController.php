<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\Outbox;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class OutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $outbox = Outbox::with(['inbox', 'petugas'])
        // $petugas = Petugas::with(['user', 'suratTugas.inbox'])
        //     ->join('laporan', 'laporan.petugas_id', '=', 'petugas.id', 'left')
        //     ->get();

        $outbox =  Outbox::with(['inbox', 'petugas.laporan', 'petugas.user'])->get();
        $outbox->loadCount(['petugas', 'laporan']);

        $karyawanNganggur = User::pegawaiNganggur()->get();

        return view('pages.admin.outbox.index', [
            'data' => $outbox,
            'user' =>  User::all(),
            'inbox' => Inbox::all(),
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
            'surat_tugas' => ['string', 'required', 'max:150'],
            'no_surat_tugas' => ['string', 'required', 'max:150','unique:surat_tugas,nomor_surat'],
            'file_outbox' => ['file', 'required', 'mimetypes:application/pdf'],
            'pegawai' => ['required'],
            'surat_masuk' => ['nullable'],
        ]);
        // $img_path = 'storage/images';
        $file = $request->file('file_outbox');
        $fileName = $request->surat_tugas . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/outbox'), $fileName);


        $surat_tugas = new Outbox;
        $surat_tugas->nama_surat = $request->surat_tugas;
        $surat_tugas->nomor_surat = $request->no_surat_tugas;
        $surat_tugas->file_surat = $fileName;
        if ($request->surat_masuk) {
            $surat_tugas->surat_masuk_id = $request->surat_masuk;
        }
        $surat_tugas->save();
        $petugas = new Petugas;
        $petugas->user_id = $request->pegawai;

        $surat_tugas->petugas()->save($petugas);

        return redirect()->route('outbox.index')->with('success', 'Data surat tugas berhasil ditambahkan');
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
        $outbox = Outbox::findOrFail($id);
        $karyawanNganggur = User::pegawaiNganggur()->get();
        return view('pages.admin.outbox.update', [
            'data' => $outbox,
            'user' =>  $karyawanNganggur,
            'inbox' => Inbox::all(),
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
        $request->validate([
            'surat_tugas' => 'required',
            'no_surat_tugas' => 'required',
            'file_outbox' => 'nullable',
            'surat_masuk' => ['nullable'],
            // 'pegawai' => ['required'],
        ]);

        $outbox = Outbox::findOrFail($id);
        $outbox->nama_surat = $request->surat_tugas;
        $outbox->nomor_surat = $request->no_surat_tugas;

        if ($request->hasFile('file_outbox')) {
            $file = $request->file('file_outbox');
            $fileName = $request->surat_tugas . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/outbox'), $fileName);
            $outbox->file_surat = $fileName;
        };

        if ($request->surat_masuk) {
            $outbox->surat_masuk_id = $request->surat_masuk;
        };

        $outbox->save();

        // $petugas = new Petugas;
        // $petugas->user_id = $request->pegawai;

        return redirect()->route('outbox.index')
            ->with('success', 'Surat Tugas   Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outbox = Outbox::findOrFail($id);

        if ($outbox->file_surat && file_exists(storage_path('app/public/outbox/' . $outbox->file_surat))) {
            Storage::delete('public/outbox/' . $outbox->file_surat);
        }

        $outbox->delete();
        return redirect()->route('outbox.index')
            ->with('success', 'Data surat tugas berhasil di hapus');
    }
}
