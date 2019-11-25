@extends('layouts.master')

@section('title')
    {{ $title }} {{ $subtitle }} - {{ config('app.name') }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('pasien.index') }}">{{ $title }}</a></li>
    <li class="active">{{ $subtitle }}</li>
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
        <form class="d-inline-block" action="{{ route('pasien.destroy',$pasien) }}" method="post">
            @csrf @method('delete')
            <button class="btn btn-danger" type="submit" role="button" onclick="confirm('Apakah anda yakin ingin menghapus pasien ini ??')">Hapus</button>    
        </form>
    @endif
    <a class="btn btn-outline-dark" href="{{ route('pasien.index') }}">Kembali</a>
    @if (auth()->user()->peran->peran=='Dokter')
        <a class="btn btn-primary" href="#modalPeriksa" data-toggle="modal">tambah periksa</a> 

        <!-- Modal -->
        <div class="modal fade" id="modalPeriksa" tabindex="-1" role="dialog" aria-labelledby="titleModalPeriksa" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleModalPeriksa">Tambah data periksa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formDataPeriksa" action="{{ route('periksa.store',$pasien) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label>Diagnosa</label>
                                <textarea name="diagnosa" id="diagnosa" type="text" class="form-control @error('diagnosa') is-invalid @enderror" placeholder="Masukkan diagnosa">{{ old('diagnosa') }}</textarea>
                                @error('diagnosa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label>Resep</label>
                                <textarea name="resep" id="resep" type="text" class="form-control @error('resep') is-invalid @enderror" placeholder="Masukkan resep">{{ old('resep') }}</textarea>
                                @error('resep') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-dark d-inline-block" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button> 
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    @endif
    <div class="card shadow-sm mt-3">
        <div class="card-header">
            <strong class="card-title">Riwayat Periksa</strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">Resep</th>
                            <th scope="col">Waktu Periksa</th>
                            <th scope="col">opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($periksa->count() == 0)
                            <tr><td class="text-center" colspan="4">Belum ada riwayat periksa</td></tr>
                        @endif
                        @foreach($periksa as $data) 
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$data->keterangan}}</td>
                                <td>{{$data->diagnosa}}</td>
                                <td>{{$data->resep}}</td>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</td>
                                <td>
                                    @if (auth()->user()->peran->peran == "Dokter")
                                        <a class="btn btn-primary" onclick="ubahPeriksa({{$data->id}})" href="#modalPeriksa" data-toggle="modal">ubah</a>
                                        <form class="d-inline-block" action="{{ route('periksa.destroy',$data) }}" method="post">
                                            @csrf @method('delete')
                                            <button class="btn btn-danger" type="submit" role="button" onclick="confirm('Apakah anda yakin ingin menghapus riwayat periksa ini ??')">Hapus</button>    
                                        </form>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $periksa->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function ubahPeriksa(id) {
            $.ajax({
                url: "{{ route('ajax.get.data.periksa') }}",
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#keterangan').append(data.keterangan);
                    $('#diagnosa').append(data.diagnosa);
                    $('#resep').append(data.resep);
                    $('#titleModalPeriksa').html('Ubah Data Periksa');
                    $('#formDataPeriksa').attr('action',"{{ url('/periksa') }}" + "/" + data.id);
                    $('#formDataPeriksa').append('<input type="hidden" name="_method" value="patch">');
                }
            });
        }
    </script>
@endpush    