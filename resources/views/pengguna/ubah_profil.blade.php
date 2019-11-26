@extends('layouts.master')


@section('title')
    {{ $title }} - {{ config('app.name') }}
@endsection

@section('breadcrumb')
    <li class="active">{{ $title }}</li>
@endsection

@section('content')
<div class="content mt-3 mb-3">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf @method('patch')
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('nama', $pengguna->nama) }}">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input disabled name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan NIK" value="{{ old('email', $pengguna->email) }}">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nip</label>
            <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukkan nip" value="{{ old('nip', $pengguna->nip) }}">
            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nomor Telepon</label>
            <input name="nomor_telepon" type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" value="{{ old('nomor_telepon',$pengguna->nomor_telepon) }}">
            @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" value="{{ old('alamat',$pengguna->alamat) }}">
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input name="foto" type="file" class="form-control @error('foto') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" value="{{ old('foto') }}">
            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>  
</div>  
@endsection