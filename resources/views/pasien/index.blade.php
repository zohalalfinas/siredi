@extends('layouts.master')

@section('title')
Pasien
@endsection

@section('content')
<div class=" content mt-3 input-group input-group-sm mb-3">

  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">cari nama pasien</span>
  </div>
  
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="button" id="button-addon1">Cari</button>
  </div>
    <div class="content mt-3">

        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">nama</th>
                <th scope="col">nik</th>
                <th scope="col">alamat</th>
                <th scope="col">opsi</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($pasien as $data) 
            <tr>
                <th scope="row">1</th>
                <td>{{$data->nama}}</td>
                <td>{{$data->nik}}</td>
                <td>{{$data->alamat}}</td>
                <td>
                    @if(auth()->user()->peran->peran=='Dokter')
                      <a class="btn btn-primary" href="{{route('periksa.create', $data)}}" role="button">periksa</a>
                    @endif
                    
                    <a class="btn btn-primary" href="{{route('pasien.show', $data)}}" role="button">detail</a>

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

    </div>
@endsection