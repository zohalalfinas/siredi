@extends('layouts.master')

@section('title')
    Ubah data pasien - {{ config('app.name') }}
@endsection

@section('content')
<div class="content mt-3">
    <div class="table-responsive">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>{{ $pasien->nama }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $pasien->nik }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $pasien->alamat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @if (auth()->user()->peran->peran=='Administrator')
        <a class="btn btn-primary" href="{{ route('pasien.edit',$pasien) }}" role="button">Ubah</a>
        <form class="d-inline-block action="{{ route('pasien.destroy',$pasien) }}" method="post">
            @csrf @method('delete')
            <button class="btn btn-danger" type="submit" role="button" onclick="confirm('Apakah anda yakin ingin menghapus pasien ini ??')">Hapus</button>    
        </form>
    @endif
    <a class="btn btn-outline-dark" href="{{ route('pasien.index') }}">Kembali</a>
</div>  
@endsection