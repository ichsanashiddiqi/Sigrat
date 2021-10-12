<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::get();
        return view('pages.admin.user.index', compact('user'));
    }


    
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required',
            'jabatan' => 'required',
            'avatar' => 'nullable',
            
        ]);

        $user = new User;
        $user->nama = $request->get('nama');
        $user->nip = $request->get('nip');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->password);
        $user->role = $request->get('role');
        $user->jabatan = $request->get('jabatan');
        if (
            $file = $request->file('avatar')
        ) {
            $fileName = $request->nama . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images'), $fileName);

            $user->avatar = $fileName;
        };
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('pages.admin.user.detail', compact('user'));
    }

   
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('pages.admin.user.update', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
         $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'role' => 'required',
            'jabatan' => 'required',
            'avatar' => 'nullable',
        ]);

        $user = User::where('id', $id)->first();
        $user->nama = $request->get('nama');
        $user->nip = $request->get('nip');
        $user->email = $request->get('email');

        if ($request->password)
            $user->password = Hash::make($request->password);

        $user->role = $request->get('role');
        $user->jabatan = $request->get('jabatan');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $request->nama. '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images'), $fileName);
            $user->avatar = $fileName;
        };

        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'Data User berhasil diubah');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
