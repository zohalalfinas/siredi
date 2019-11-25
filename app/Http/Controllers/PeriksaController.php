<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Periksa;
use Alert;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request, Pasien $pasien)
    {
        $request->validate([
            'keterangan'    => ['required','string'],
            'diagnosa'      => ['required','string'],
            'resep'         => ['required','string'],
        ]);

        Periksa::create([
            'keterangan'    => $request->keterangan,
            'diagnosa'      => $request->diagnosa,
            'resep'         => $request->resep,
            'pasien_id'     => $pasien->id,
        ]);

        Alert::success('Data periksa berhasil ditambahkan','Berhasil');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periksa $periksa)
    {
        $request->validate([
            'keterangan'    => ['required','string'],
            'diagnosa'      => ['required','string'],
            'resep'         => ['required','string'],
        ]);

        $periksa->diagnosa      = $request->diagnosa;
        $periksa->keterangan    = $request->keterangan;
        $periksa->resep         = $request->keterangan;
        $periksa->save();

        Alert::success('Data periksa berhasil diperbarui','Berhasil');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periksa $periksa)
    {
        Periksa::destroy($periksa->id);

        Alert::success('Data periksa berhasil dihapus','Berhasil');
        return back();
    }

    /**
     * Display the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataPeriksa(Request $request)
    {
        echo json_encode(Periksa::find($request->id));
    }
}
