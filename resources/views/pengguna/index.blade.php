@extends('layouts.master')
@section('title')
    Pengguna - {{ config('app.name') }}
@endsection
@section('content')
<div class="content mt-3" style="display:inline-block">
    <a href="">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Dokter</div>
            <div class="card-body text-primary">
              <img src="{{asset('template/images/doctor.jpg')}}" alt="">
            </div>
        </div>
    </a>
    <a href="">
        <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Pasien</div>
            <div class="card-body text-secondary">
                <img src="{{asset('template/images/patient.jpg')}}" alt="">
            </div>
        </div>
    </a>
</div>

@endsection