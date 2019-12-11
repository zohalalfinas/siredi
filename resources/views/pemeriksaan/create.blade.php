{{-- @extends('layouts.master')

@section('title')
    tambah data periksa - {{ config('app.name') }}
@endsection


@section('content')<form>

  <div class="content mt-3">
      <div class="form-group" enctype="multipart/form-data">
          <label for="nama">nama</label>
          <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="nama">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
      <div class="form-group">
          <label for="keterangan">keterangan</label>
          <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" aria-describedby="emailHelp" placeholder="keterangan">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="diagnosa">diagnosa</label>
          <input type="text" class="form-control" id="diagnosa" placeholder="diagnosa">
        </div>
        <div class="form-group">
          <label for="resep">resep</label>
          <input type="text" class="form-control" id="resep" placeholder="resep">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
       <a href=""><button type="submit" class="btn btn-primary w-25">save</button></a> 
      </form>
  </div>
    
@endsection --}}