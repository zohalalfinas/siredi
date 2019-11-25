<?php

namespace App\Http\Controllers;

use App\Pasien;
use Alert;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::all();
        return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
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
            'nama'      => ['required','string','max:60'],
            'nik'       => ['required','digits:16'],
            'alamat'    => ['required','string'],
        ]);

        $pasien =  Pasien::Create($request->all());
        Alert::success('Pasien berhasil ditambahkan','Berhasil');
        return redirect()->route('pasien.show',$pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama'      => ['required','string','max:60'],
            'nik'       => ['required','digits:16'],
            'alamat'    => ['required','string'],
        ]);

        $pasien->nama   = $request->nama;
        $pasien->nik    = $request->nik;
        $pasien->alamat = $request->alamat;
        $pasien->save();
        Alert::success('Pasien berhasil diperbarui','Berhasil');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);
        Alert::success('Pasien berhasil dihapus','Berhasil');
        return redirect('/pasien');
    }
}
