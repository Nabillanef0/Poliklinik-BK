<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id_dokter = Auth::user()->id_dokter;
        $data = [
            'title' => 'Jadwal Periksa',
            'jadwal_periksa' => JadwalPeriksa::where('id_dokter', $id_dokter)->get(),
            'content' => 'dashboard.jadwal_periksa.index'
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
            'title' => 'Jadwal Periksa',
            'content' => 'dashboard.jadwal_periksa.create'
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
            'hari' => 'required|min:1|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'status' => 'numeric',
        ]);

        $data['id_dokter'] = auth()->user()->id_dokter;

        $jadwal = JadwalPeriksa::create($data);

        if ($data['status'] == 1) {
            JadwalPeriksa::where('id_dokter', $data['id_dokter'])
            ->where('id', '!=', $jadwal->id)
            ->update([
                'status' => false,
            ]);
        }

        Alert::success('Success', 'Data Jadwal Periksa telah ditambahkan!!');
        return redirect('/jadwal_periksa')->with('success', 'Data Jadwal Periksa telah ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [
            'jadwal_periksa' => JadwalPeriksa::find($id),
            'content' => 'dashboard.jadwal_periksa.edit'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $jadwal = JadwalPeriksa::find($id);
        $data = $request->validate([
            'hari' => 'min:1|max:255',
            'jam_mulai' => 'date_format:H:i',
            'jam_selesai' => 'date_format:H:i|after:jam_mulai',
            'status' => 'numeric',
        ]);

        $jadwal->update($data);

        if ($data['status'] == 1) {
            $jadwal = JadwalPeriksa::find($id);
            JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)
                ->where('id', '!=', $id)
                ->update([
                    'status' => false,
                ]);
        }

        Alert::success('Success', 'Data Jadwal Periksa telah diperbarui!!');
        return redirect('/jadwal_periksa')->with('success', 'Data Jadwal Periksa telah diperbarui!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
