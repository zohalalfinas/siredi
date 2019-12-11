<?php

namespace App\Http\Controllers;

use App\Pasien;
use Alert;
use App\Periksa;
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
        $title = 'Pasien';
        $pasien = Pasien::paginate(10);
        return view('pasien.index', compact('pasien','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Pasien';
        $subtitle = 'Tambah Data';
        $pasien = Pasien::all();
        return view('pasien.create',compact('title','subtitle', 'pasien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'nama'      => ['required','string','max:60'],
            'nik'       => ['required','digits:16','unique:pasien'],
            'alamat'    => ['required','string'],
            'foto' => ['image','mimes:jpeg,png','max:2048'],
        ]);
        if ($request->foto_pasien) {
            $data['foto']   = $this->setImageUpload($request->foto,'img/foto_profil');
        } else {
            $data['foto'] = 'default.jpg';
        }
        $pasien = Pasien::Create($data);
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
        $title = 'Pasien';
        $subtitle = 'Detail Data';
        $periksa = Periksa::wherePasienId($pasien->id)->paginate(10);
        return view('pasien.show', compact('pasien','periksa','title','subtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        $title = 'Pasien';
        $subtitle = 'Ubah Data';
        return view('pasien.edit', compact('pasien','title','subtitle'));
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
        
       $data =  $request->validate([
            'nama'      => ['required','string','max:60'],
            'nik'       => ['required','digits:16'],
            'alamat'    => ['required','string'],
            'foto' => ['image','mimes:jpeg,png','max:2048'],
        ]);
        
        
        if ($request->foto_pasien) {
            $data['foto']   = $this->setImageUpload($request->foto,'img/foto_profil', $pasien->foto);
        } else {
            $data['foto'] = 'default.jpg';
        }
        $pasien->update($data);
        Alert::success('Pasien berhasil diperbarui','Berhasil');
        return redirect()->route('pasien.show', $pasien);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        if($pasien->foto != 'default.jpg'){
            File::delete(public_path('img/foto_profil/'.$pasien->foto));
        }
        Pasien::destroy($pasien->id);
        Alert::success('Pasien berhasil dihapus','Berhasil');
        return redirect()->route('pasien.show', $pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $title = 'Pasien';
        $pasien = Pasien::orWhere('nama', 'like', '%' . $request->cari . '%')
                            ->orWhere('nik', 'like', '%' . $request->cari . '%')
                            ->orWhere('alamat', 'likse', '%' . $request->cari . '%')
                            ->paginate(10);
        return view('pasien.index', compact('pasien','title'));
    }
}
