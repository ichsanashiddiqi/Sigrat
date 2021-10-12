<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Inbox::all();
        return view('pages.admin.inbox.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
            'inbox' => ['string', 'required', 'max:150'],
            'no_inbox' => ['string', 'required', 'max:150'],
            'file_inbox' => ['file', 'required', 'mimetypes:application/pdf'],
        ]);
        // $img_path = 'storage/images';
        $file = $request->file('file_inbox');
        $fileName = $request->inbox . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/inbox'), $fileName);

        $data = [
            'nama_surat' => $request->inbox,
            'nomor_surat' => $request->no_inbox,
            'file_surat' => $fileName,
        ];
        DB::table('surat_masuk')->insert($data);

        return redirect()->route('inbox.index')->with('success', 'Data surat masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Inbox::findOrFail($id);
        return view('admin/inbox/detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inbox = Inbox::findOrFail($id);
        return view('pages.admin.inbox.update', compact('inbox'));
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
            'inbox' => 'required',
            'no_inbox' => 'required',
            'file_inbox' => 'nullable',
        ]);

        $inbox = Inbox::findOrFail($id);

        $inbox->nama_surat = $request->get('inbox');
        $inbox->nomor_surat = $request->get('no_inbox');

        if ($request->hasFile('file_inbox')) {
            $file = $request->file('file_inbox');
            $fileName = $request->inbox . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/inbox'), $fileName);
            $inbox->file_surat = $fileName;
        };

        $inbox->save();
        return redirect()->route('inbox.index')
            ->with('success', 'Surat Masuk Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inbox = Inbox::findOrFail($id);

        if ($inbox->file_surat && file_exists(storage_path('app/public/inbox/' . $inbox->file_surat))) {
            Storage::delete('public/inbox/' . $inbox->file_surat);
        }

        $inbox->delete();
        return redirect()->route('inbox.index')
            ->with('success', 'Data surat masuk berhasil di hapus');
    }
}
