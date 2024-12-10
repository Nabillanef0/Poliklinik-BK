<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajemen Dokter',
            'dokter' => Dokter::get(),
            'content' => 'dashboard.dokter.index'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Dokter',
            'content' => 'dashboard.dokter.create',
            'polis' => Poli::all(),
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama' => 'required|min:1|max:255',
            'alamat' => 'required|min:1|max:255',
            'no_hp' => 'required|min:1|max:15',
            'id_poli' => 'required|exists:polis,id',
        ]);

        $d = Dokter::create($data);
        User::create([
            'name' => $data['nama'],
            'email' => $data['nama'],
            'password' => bcrypt($data['alamat']),
            'id_dokter' => $d->id,
            'role' => 'dokter'
        ]);

        Alert::success('Success', 'Data Poli telah ditambahkan!!');
        return redirect('/dokter')->with('success', 'Data Dokter telah ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = [
            'dokter' => Dokter::findOrFail($id),
            'content' => 'dashboard.dokter.show'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [
            'dokter' => Dokter::find($id),
            'content' => 'dashboard.dokter.edit',
            'polis' => Poli::all(),
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dokter = Dokter::find($id);
        $data = $request->validate([
            'nama' => 'required|min:1|max:255',
            'alamat' => 'required|min:1|max:255',
            'no_hp' => 'required|min:1|max:15',
            'id_poli' => 'required|exists:polis,id',
        ]);

        $dokter->update($data);

        $user = User::where('id_dokter', $id)->first();
        $user->update([
            'name' => $request->nama,
            'email' => $request->nama,
            'password' => bcrypt($request->alamat)
        ]);
        
        Alert::success('Success', 'Data Dokter telah diperbarui!!');
        return redirect('/dokter')->with('success', 'Data Dokter telah diperbarui!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dokter = Dokter::find($id);
        $dokter->delete();
        Alert::success('Success', 'Data Dokter telah dihapus!!');
        return redirect('/dokter')->with('success', 'Data Dokter telah dihapus!!');
    }
}
