@extends('layouts.master')

@section('title')
    Tambah data pasien - {{ config('app.name') }}
@endsection

@section('content')
<div class="content mt-3">
    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('nama') }}">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>NIK</label>
            <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK" value="{{ old('nik') }}">
            @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat" value="{{ old('alamat') }}">
            @error('alamat') <div class="inval id-feedback">{{ $message }}</div> @enderror
        </div>
        <a class="btn btn-outline-dark d-inline-block" href="{{ route('pasien.index') }}">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>  
</div>  
@endsection