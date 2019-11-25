<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Support\Facades\DB;
use App\Periksa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeriksaan = Periksa::all();
        return view('pemeriksaan.index', compact('pemeriksaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pasien $pasien)
    {
        return view('pemeriksaan.create', compact('pasien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
       // print 'halo';
        $periksa = new Periksa;
        $periksa->tgl_pemeriksaan  = $request->periksa ;
        $periksa->jam_pemeriksaan = $request->jam;
        $periksa->diagnosa = $request->diagnosa;
        $periksa->keterangan = $request->keterangan;
        $periksa->save();

        return redirect('/pemeriksaan');
        $request->validate([
                            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $periksa = Periksa::find($id);
        $periksa->tgl_pemeriksaan  = $request->periksa ;
        $periksa->jam_pemeriksaan = $request->jam;
        $periksa->diagnosa = $request->diagnosa;
        $periksa->keterangan = $request->keterangan;
        $periksa->update();
 
        return redirect('/pemeriksaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periksa = Periksa::find($id);
        $periksa->delete();

        return redirect('/pemeriksaan');
    }
}
