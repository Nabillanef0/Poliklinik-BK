<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajemen Poli',
            'poli' => Poli::get(),
            'content' => 'dashboard.poli.index'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'title' => 'Tambah Poli',
            'content' => 'dashboard.poli.create'
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
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        Poli::create($data);
        Alert::success('Success', 'Data Poli telah ditambahkan!!');
        return redirect('/poli')->with('success', 'Data Poli telah ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = [
            'poli' => Poli::findOrFail($id),
            'content' => 'dashboard.poli.show'
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
            'poli' => Poli::find($id),
            'content' => 'dashboard.poli.edit'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $poli = Poli::find($id);
        $data = $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $poli->update($data);
        Alert::success('Success', 'Data Poli telah diperbarui!!');
        return redirect('/poli')->with('success', 'Data Poli telah diperbarui!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $poli = Poli::find($id);
        $poli->delete();
        Alert::success('Success', 'Data Poli telah dihapus!!');
        return redirect('/poli')->with('success', 'Data Poli telah dihapus!!');
    }
}
