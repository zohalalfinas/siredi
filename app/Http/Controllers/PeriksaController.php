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
     */
    public function store(Request $request, Pasien $pasien)
    {
        $periksa = $request->validate([
            'keterangan'    => ['required','string'],
            'diagnosa'      => ['required','string'],
            'resep'         => ['required','string'],
            'bukti_periksa' => ['image', 'mimes:jpeg,png', 'max:2048']
        ]);

        $periksa['pasien_id'] = $pasien->id;
        if ($request->bukti_periksa) {
            $periksa['bukti_periksa']   = $this->setImageUpload($request->bukti_periksa,'img/bukti');
        } else {
            $periksa['bukti_periksa'] = 'default.jpg';
        }

        Periksa::create($periksa);
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
        $data = $request->validate([
            'keterangan'    => ['required','string'],
            'diagnosa'      => ['required','string'],
            'resep'         => ['required','string'],
            'bukti_periksa' => ['image','mimes:jpeg,png', 'max:2048'],
        ]);

        if ($request->bukti_periksa) {
            $data['bukti_periksa']   = $this->setImageUpload($request->bukti_periksa,'img/bukti', $periksa->bukti_periksa);
        }
        $periksa->update($data);

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
    public function setImageUpload($file, $path, $old_file = null)
    {
        $file_name = time() . "_" . $file->getClientOriginalName();
        if ($file->move(public_path($path), $file_name)) {
            if ($old_file) {
                if ($old_file != 'default.jpg') {
                    File::delete(public_path($path . '/' . $old_file));
                }
            }
            return $file_name;
        } else {
            Alert::error('Foto gagal diunggah', 'gagal')->persistent('tutup');
            return back();
        }
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