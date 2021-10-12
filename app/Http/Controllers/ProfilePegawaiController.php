<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfilePegawaiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        return view('pages.pegawai.profile', array('user' => Auth::user()));
        
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'avatar' => 'nullable',
        ]);

        $user->nama = $request->get('nama');
        $user->nip = $request->get('nip');
        $user->email = $request->get('email');

        if ($request->password)
            $user->password = Hash::make($request->password);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $request->nama. '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images'), $fileName);
            $user->avatar = $fileName;
        };

        $user->save();
       
        return redirect()->route('profilePegawai');
    }
}
