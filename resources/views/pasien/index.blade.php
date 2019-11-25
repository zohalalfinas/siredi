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
              @if (auth()->user()->peran->peran=='Administrator')
                <a class="btn btn-primary btn-lg w-100 " href="{{route('pasien.create', $data)}}" role="button">tambah</a>
              @endif
              
                <th scope="row">1</th>
                <td>{{$data->nama}}</td>
                <td>{{$data->nik}}</td>
                <td>{{$data->alamat}}</td>
                <td>
                    @if(auth()->user()->peran->peran=='Dokter')
                      <a class="btn btn-primary" href="{{route('periksa.create', $data)}}" role="button">periksa</a>
                      <a class="btn btn-primary" href="{{route('pasien.show', $data)}}" role="button">detail</a>
                    @endif
                    @if (auth()->user()->peran->peran=='Administrator')
                      <a class="btn btn-primary" href="" role="button">edit</a>
                      <a class="btn btn-danger" href="" role="button" data-toggle="modal" data-target="#exampleModal">hapus</a> 
                      
                      
                      {{-- modal --}}
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">hapus data pasien</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              apakah anda yakin ingin menghapus data pasien. ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-primary">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif
                    

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

    </div>
@endsection