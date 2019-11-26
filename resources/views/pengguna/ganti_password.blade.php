@extends('layouts.master')


@section('title')
    {{ $title }} - {{ config('app.name') }}
@endsection

@section('breadcrumb')
    <li class="active">{{ $title }}</li>
@endsection

@section('content')
<div class="content mt-3 mb-3">
    <form action="{{ route('profil.update_password') }}" method="POST">
        @csrf @method('put')
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password Lama">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input name="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror" placeholder="Masukkan Password Baru">
            @error('password_baru') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input name="konfirmasi_password" type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" placeholder="Ulangi Password Baru">
            @error('konfirmasi_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>  
</div>  
@endsection