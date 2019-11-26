@extends('layouts.master')

@section('title')
    {{ $title }} - {{ config('app.name') }}
@endsection

@section('breadcrumb')
    <li class="active">{{ $title }}</li>
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
</div>
@endsection

