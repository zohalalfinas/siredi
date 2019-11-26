@extends('layouts.master')
@section('title')
    Pengguna - {{ config('app.name') }}
@endsection
@section('content')
<div class="container mt-3 ">
        <form action="" method="get">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">cari nama pengguna</span>
                </div>
                <input name="cari" type="text" class="form-control">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <a class="btn btn-primary btn-lg w-100 " href="{{route('pengguna.create')}}" role="button">tambah</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">NIP</th>
                        <th scope="col">No.telp</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengguna as $data) 
                        <tr>
                            
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->nip}}</td>
                            <td>{{$data->nomor_telepon}}</td>
                            <td>    
                                <a class="btn btn-primary" href="{{route('pengguna.show', $data)}}" role="button">detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pengguna->links() }}
        </div>
    </div>
@endsection