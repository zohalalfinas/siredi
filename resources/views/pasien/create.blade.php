@extends('layouts.master')

@section('title')
    tambah data pasien - {{ config('app.name') }}
@endsection

@section('content')
<div class="content mt-3">
    <form>
        <div class="form-group">
          <label for="exampleInputEmail1">nama</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">nik</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">alamat</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>  
</div>  
@endsection