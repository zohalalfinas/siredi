@extends('layouts.master')


@section('title')
    {{ $title }} {{ $subtitle }} - {{ config('app.name') }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('pengguna.index') }}">{{ $title }}</a></li>
    <li class="active">{{ $subtitle }}</li>
@endsection

@section('content')
<div class="content mt-3 mb-3">
    <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('nama') }}">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan NIK" value="{{ old('email') }}">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nip</label>
            <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukkan nip" value="{{ old('nip') }}">
            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Nomor Telepon</label>
            <input name="nomor_telepon" type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" value="{{ old('nomor_telepon') }}">
            @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Nomor Telepon" value="{{ old('alamat') }}">
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Peran</label>
            <select name="peran" type="text" class="form-control @error('peran') is-invalid @enderror">
                <option value="">Pilih Peran</option>
                @foreach ($peran as $data)
                    <option value="{{ $data->id }}" {{ old('peran') == $data->id ? 'selected' : ''  }}>{{ $data->peran }}</option>   
                @endforeach
            </select>
            @error('peran') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input name="foto" type="file" class="form-control @error('foto') is-invalid @enderror" placeholder="Masukkan foto" value="{{ old('foto') }}">
            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <a class="btn btn-outline-dark d-inline-block" href="{{ route('pengguna.index') }}">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>  
</div>  
@endsection