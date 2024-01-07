@extends('layouts.template')

@section('content')
<div class="row">

    <h1>Dashboard</h1>
    <p>home/dashboard</p>
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Peserta Didik</h5>
          <p class="card-text">6</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Administrator</h5>
          <p class="card-text">1</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pembimbing Siswa</h5>
            <p class="card-text">5</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rombel</h5>
            <p class="card-text">12</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rayon</h5>
            <p class="card-text">5</p>
          </div>
        </div>
      </div>
  </div>
@endsection