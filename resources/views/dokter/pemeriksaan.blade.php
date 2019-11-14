@extends('dokter/layout')

@section('tittle')
pemeriksaan
@endsection

@section('content')
<div class="content mt-3">
  <button type="button" class="content btn btn-outline-info btn-lg " data-toggle="modal" data-target="#exampleModal">Tambah</button>    
</div>

<div class="content mt-3">

  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">No</th>
        <th scope="col">tgl pemeriksaan</th>
        <th scope="col">jam pemeriksaan</th>
        <th scope="col">diagnosa</th>
        <th scope="col">keterangan</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($pemeriksaan as $p)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $p->tgl_pemeriksaan }}</td>
        <td>{{ $p->jam_pemeriksaan}}</td>
        <td>{{ $p->diagnosa}}</td>
        <td>{{ $p->keterangan}}</td>
        <td><button type="button" class="btn btn-primary btn-sm" >Detail</button></td>
        <td> <button type="submit" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{$p->id}}" >Edit</button> </td>
        <td><button  type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal{{$p->id}}">Delete</button></td>
<!-- edit -->
        <div class="modal fade" id="editModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/dokter/pemeriksaan/ubahData/{{$p->id}}" method="post" >
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">tgl periksa</label>
                    <input value="{{ $p->tgl_pemeriksaan }}" name="periksa" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">jam periksa</label>
                    <input value="{{ $p->jam_pemeriksaan }}" name="jam" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">diagnosa</label>
                    <input value="{{ $p->diagnosa }}" name="diagnosa" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">keterangan</label>
                    <input value="{{ $p->keterangan }}" name="keterangan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                  </div> 
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- delete -->
                <div class="modal fade" id="hapusModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/dokter/pemeriksaan/hapusData/{{$p->id}}" method="post" >
                  @csrf
                  apakah anda yakin akan menghapus data?
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">delete</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </tr>

      @endforeach
    </tbody>
  </table>
</div>
<!-- Button trigger modal -->


<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tambahData" method="post" >
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">tgl periksa</label>
            <input name="periksa" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">jam periksa</label>
            <input name="jam" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">diagnosa</label>
            <input name="diagnosa" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">keterangan</label>
            <input name="keterangan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          </div> 
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection