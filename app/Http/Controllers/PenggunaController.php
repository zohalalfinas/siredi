<?php

namespace App\Http\Controllers;

use File;
use Alert;
use App\Peran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengguna';
        $pengguna = User::paginate(10);
        return view('pengguna.index', compact('pengguna','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Pengguna';
        $subtitle = 'Tambah data';
        $peran = Peran::all();
        return view('pengguna.create', compact('title', 'subtitle','peran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'nama'          => ['required','string','max:60'],
            'email'         => ['required','email','unique:users'],
            'nip'           => ['nullable','digits:18','unique:users'],
            'nomor_telepon' => ['nullable','digits_between:6,13'],
            'alamat'        => ['nullable','string'],
            'peran'         => ['required'],
            'foto'          => ['image', 'mimes:jpeg,png', 'max:2048'],
        ]);

        $user['peran_id']   = $request->peran;
        if ($request->foto) {
            $user['foto']   = $this->setImageUpload($request->foto,'img/foto_profil');
        } else {
            $user['foto'] = 'default.jpg';
        }
        $user['password']   = Hash::make('rahasia123');
        $pengguna = User::create($user);
        $pengguna->save();

        Alert::success('Pengguna berhasil ditambahkan','Berhasil');
        return redirect()->route('pengguna.show', $pengguna);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        $title = 'Pengguna';
        $subtitle = 'Detail Data';
        $peran = Peran::all();
        return view('pengguna.show', compact('pengguna', 'title', 'subtitle','peran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        $title = 'Pengguna';
        $subtitle = 'Ubah Data';
        $peran = Peran::all();
        return view('pengguna.edit', compact('pengguna', 'title', 'subtitle','peran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $user = $request->validate([
            'nama'          => ['required','string','max:60'],
            'email'         => ['required','email','unique:users'],
            'nip'           => ['nullable','digits:18','unique:users'],
            'nomor_telepon' => ['nullable','digits_between:6,13'],
            'alamat'        => ['nullable','string'],
            'peran'         => ['required'],
            'foto'          => ['image','mimes:jpeg,png','max:2048'],
        ]);

        $user['peran_id']  = $request->peran;
        if ($request->foto) {
            $user['foto']   = $this->setImageUpload($request->foto,'img/foto_profil',$pengguna->foto);
        }

        $pengguna->update($user);

        Alert::success('Pengguna berhasil diperbarui','Berhasil');
        return redirect()->route('pengguna.show', $pengguna);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        if($pengguna->foto != 'default.jpg'){
            File::delete(public_path('img/foto_profil/'.$pengguna->foto));
        }
        User::destroy($pengguna->id);
        Alert::success('Pengguna berhasil dihapus','Berhasil');
        return redirect('/pengguna');
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

    public function profil()
    {
        $title = 'Profil';
        $pengguna = User::find(auth()->user()->id);
        return view('pengguna.profil',compact('title','pengguna'));
    }

    public function ubahProfil()
    {
        $title = 'Ubah Profil';
        $pengguna = User::find(auth()->user()->id);
        return view('pengguna.ubah_profil',compact('title','pengguna'));
    }

    public function updateProfil(Request $request)
    {
        $pengguna = User::find(auth()->user()->id);
        $user = $request->validate([
            'nama'          => ['required','string','max:60'],
            'nip'           => ['nullable','digits:18'],
            'nomor_telepon' => ['nullable','digits_between:6,13'],
            'alamat'        => ['nullable','string'],
            'foto'          => ['image','mimes:jpeg,png','max:2048'],
        ]);

        if ($request->foto) {
            $user['foto']   = $this->setImageUpload($request->foto,'img/foto_profil',$pengguna->foto);
        }

        $pengguna->update($user);

        Alert::success('Pengguna berhasil diperbarui','Berhasil');
        return back();
    }
    
    public function showChangePassword()
    {
        $title = 'Ganti Password';
        return view('pengguna.ganti_password',compact('title'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_baru' => 'required|min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'required|min:8'
        ]);
        $user = User::find(auth()->user()->id);
        if (Hash::check($request->password, $user->password)) {
            if ($request->password == $request->konfirmasi_password) {
                Alert::error('Gagal mengganti password, password gagal diperbarui', 'Gagal')->persistent("Close this");
                return redirect('/profil/ganti-password');
            } else {
                if ($request->password_baru == $request->konfirmasi_password) {
                    $user->password = Hash::make($request->konfirmasi_password);
                    $user->save();
                    Alert::success('Password berhasil diperbarui', 'Berhasil');
                    return redirect('/profil/ganti-password');
                } else {
                    Alert::error('Password tidak sama, password gagal diperbarui', 'Gagal')->persistent("Close this");
                    return redirect('/profil/ganti-password');
                }
            }
        } else {
            Alert::error('Password lama salah, password gagal diperbarui', 'Gagal')->persistent("Close this");
            return redirect('/profil/ganti-password');
        }
    }

    public function resetPassword(User $pengguna)
    {
        $pengguna->password = Hash::make('rahasia123');
        $pengguna->save();
        Alert::success('Password berhasil direset','Berhasil');
        return redirect()->route('pengguna.show', $pengguna);
    }
}
