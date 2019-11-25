@extends('layouts.master')

@section('title')
    Ubah data pasien - {{ config('app.name') }}
@endsection

@section('content')
<div class="content mt-3">
    <form action="{{ route('pasien.update',$pasien) }}" method="POST">
        @csrf @method('patch')
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('nama',$pasien->nama) }}">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>NIK</label>
            <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK" value="{{ old('nik',$pasien->nik) }}">
            @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Password" value="{{ old('alamat',$pasien->alamat) }}">
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <a class="btn btn-outline-dark d-inline-block" href="{{ route('pasien.show',$pasien) }}">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>  
</div>  
@endsection