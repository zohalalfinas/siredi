@extends('layouts.master')

@section('title')
Pasien
@endsection

@section('content')
<div class="container mt-3 ">
    <form action="{{ route('pasien.search') }}" method="get">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">cari nama pasien</span>
            </div>
            <input name="cari" type="text" class="form-control">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    @if (auth()->user()->peran->peran == 'Administrator')
        <a class="btn btn-primary btn-lg w-100 " href="{{route('pasien.create')}}" role="button">tambah</a>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasien as $data) 
                    <tr>
                        
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->nik}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('pasien.show', $data)}}" role="button">detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pasien->links() }}
    </div>
</div>
@endsection