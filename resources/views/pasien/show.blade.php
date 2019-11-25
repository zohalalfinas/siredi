@extends('layouts.master')

@section('title')
     data pasien - {{ config('app.name') }}
@endsection

@section('content')
<div class="content mt-3">
    <div class="table-responsive">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td>nama</td>
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
    @if (auth()->user()->peran->peran=='Dokter')
       <a class="btn btn-primary" href="#modal-tambah" data-toggle="modal">tambah periksa</a>    


       <!-- Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data periksa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('pasien.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>keterangan</label>
                    <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan keterangan" value="{{ old('keterangan') }}">
                    @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label>diagnosa</label>
                    <input name="diagnosa" type="text" class="form-control @error('diagnosa') is-invalid @enderror" placeholder="Masukkan diagnosa" value="{{ old('diagnosa') }}">
                    @error('diagnosa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label>resep</label>
                    <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat" value="{{ old('alamat') }}">
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-dark d-inline-block" href="{{ route('pasien.index') }}">Kembali</a>
                    <a href="" class="btn btn-primary">Simpan</a> 

                </div>
            </form>  
        </div>
        
      </div>
    </div>
  </div>
    @endif
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">diagnosa</th>
                <th scope="col">resep</th>
                <th scope="col">opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasien->periksa as $data) 
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$data->diagnosa}}</td>
                    <td>{{$data->resep}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('periksa.show', $data)}}" role="button">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection