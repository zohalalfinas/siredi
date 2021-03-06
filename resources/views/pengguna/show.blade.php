@extends('layouts.master')

@section('title')
    {{ $title }} {{ $subtitle }} - {{ config('app.name') }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('pengguna.index') }}">{{ $title }}</a></li>
    <li class="active">{{ $subtitle }}</li>
@endsection

@section('content')

<div class="content mt-3 mb-5">
    <div class="text-center mb-3">
        <img src="{{ asset('img/foto_profil/'.$pengguna->foto) }}" alt="{{ $pengguna->foto }}" class="mw100">
    </div>
    <div class="table-responsive">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>{{ $pengguna->nama }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $pengguna->email }}</td>
                </tr>
                <tr>
                    <td>Nip</td>
                    <td>{{ $pengguna->nip }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $pengguna->alamat }}</td>
                </tr>
                <tr>
                    <td>No telp</td>
                    <td>{{ $pengguna->nomor_telepon }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a class="btn btn-outline-dark" href="{{ route('pengguna.index') }}">Kembali</a>
    <a class="btn btn-primary" href="{{ route('pengguna.edit',$pengguna) }}" role="button">Ubah</a>
    <form class="d-inline-block" action="{{ route('pengguna.destroy',$pengguna) }}" method="post">
        @csrf @method('delete')
        <button class="btn btn-danger" type="submit" role="button" onclick="confirm('Apakah anda yakin ingin menghapus pengguna ini ??')">Hapus</button>    
    </form>
    <form class="d-inline-block"  action="{{ route('pengguna.reset',$pengguna) }}" method="post">
        @csrf @method('put')
        <button class="btn btn-dark" type="submit" role="button" onclick="confirm('Apakah anda yakin ingin mereset password pengguna ini ??')">Reset Password</button>    
    </form>
</div>
@endsection

