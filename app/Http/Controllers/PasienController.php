<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pasien = Pasien::all(); 

        $data = [
            'title' => 'Manajemen Pasien',
            'pasien' => $pasien,
            'content' => 'dashboard.pasien.index',
        ];

        return view('layouts.wrapper', $data);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $noRM = Pasien::generateNoRM();
        $data = [
            'title' => 'Tambah Pasien',
            'content' => 'dashboard.pasien.create',
            'noRM' => $noRM,
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|min:1|max:255',
            'alamat' => 'required|min:1|max:255',
            'no_ktp' => 'required|min:1|max:16',
            'no_hp' => 'required|min:1|max:12',
            // 'no_rm' => Pasien::generateNoRM(),
        ]);

        $data['no_rm'] = Pasien::generateNoRM();

        $p = Pasien::create($data);

        User::create([
            'name' => $data['nama'],
            'email' => $data['nama'],
            'password' => bcrypt($data['alamat']),
            'id_pasien' => $p->id,
            'role' => 'pasien'
        ]);
    
        Alert::success('Success', 'Data Pasien telah ditambahkan!!');
        return redirect('/pasien')->with('success', 'Data Pasien telah ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pasien = Pasien::findOrFail($id);

        $data = [
            'pasien' => $pasien,
            'content' => 'dashboard.pasien.show'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pasien = Pasien::find($id);

        $data = [
            'title' => 'Edit Pasien',
            'content' => 'dashboard.pasien.edit',
            'pasien' => $pasien, 
            'noRM' => $pasien->no_rm,
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pasien = Pasien::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required|min:1|max:255',
            'alamat' => 'required|min:1|max:255',
            'no_ktp' => 'required|min:1|max:16',
            'no_hp' => 'required|min:1|max:12',
        ]);

        $data['no_rm'] = $pasien->no_rm; 

        $pasien->update($data);

        $user = User::where('id_pasien', $id)->first();
        $user->update([
            'name' => $request->nama,
            'email' => $request->nama,
            'password' => bcrypt($request->alamat)
        ]);

        Alert::success('Success', 'Data Pasien telah diperbarui!!');
        return redirect('/pasien')->with('success', 'Data Pasien telah diperbarui!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        Alert::success('Success', 'Data Pasien telah dihapus!!');
        return redirect('/pasien')->with('success', 'Data Pasien telah dihapus!!');
    }
}
