<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $obat = Obat::all();
        $data = [
            'title' => 'Manajemen Obat',
            'obat' => $obat, 
            'content' => 'dashboard.obat.index',
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
            'title' => 'Tambah Obat',
            'content' => 'dashboard.obat.create', 
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
            'nama_obat' => 'required|min:1|max:225',
            'kemasan' => 'required|min:1|max:225',
            'harga' => 'required|integer|min:3',
        ]);

        Obat::create($data);

        Alert::success('Success', 'Data Obat telah ditambahkan!!');
        return redirect('/obat')->with('success', 'Data Obat telah ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $obat = Obat::findOrFail($id);

        $data = [
            'obat' => $obat,
            'content' => 'dashboard.obat.show',
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $obat = Obat::findOrFail($id);

        $data = [
            'title' => 'Edit Obat',
            'content' => 'dashboard.obat.edit',
            'obat' => $obat, 
        ];

        return view('layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $obat = Obat::findOrFail($id);

        $data = $request->validate([
            'nama_obat' => 'required|min:1|max:225',
            'kemasan' => 'required|min:1|max:225',
            'harga' => 'required|integer|min:3',
        ]);

        $obat->update($data);

        Alert::success('Success', 'Data Obat telah diperbarui!!');
        return redirect('/obat')->with('success', 'Data Obat telah diperbarui!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $obat = Obat::findOrFail($id);

        $obat->delete();

        Alert::success('Success', 'Data Obat telah dihapus!!');
        return redirect('/obat')->with('success', 'Data Obat telah dihapus!!');
    }
}
