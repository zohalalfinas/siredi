<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Periksa;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeriksaan = DB::table('pemeriksaan')->get();
        return view('dokter/pemeriksaan', ['pemeriksaan' => $pemeriksaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // print 'halo';
        $periksa = new Periksa;
        $periksa->tgl_pemeriksaan  = $request->periksa ;
        $periksa->jam_pemeriksaan = $request->jam;
        $periksa->diagnosa = $request->diagnosa;
        $periksa->keterangan = $request->keterangan;
        $periksa->save();

        return redirect('dokter/pemeriksaan');
        $request->validate([
                            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function show(Periksa $periksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Periksa $periksa)
    {
        //
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
        return $periksa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periksa $periksa)
    {
        //
    }
}
