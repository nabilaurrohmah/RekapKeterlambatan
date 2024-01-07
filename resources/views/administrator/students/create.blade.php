@extends('layouts.template')

@section('content')
<div class="justify-content-start jumbotron py-3" style="line-height: 5px; padding-bottom:30px;">
  <h4>Tambah Data Keterlambatan</h4>
  <a href="#" style="color: black;">Home /</a>
  <a href="{{route('students.index')}}" style="color: black;">Data Keterlambatan</a> 
  <a href="{{route('students.create')}}" style="color: black;">Tambah Data Keterlambatan </a> 
</div>
    <form action="{{ route('students.store')}}" class="card mt-3 p-5" method="POST">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @csrf
        <div class="mb-3 row">
            <label for="nis" class="form-label">Nis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel_id" class="form-label">Rombel</label>
            <div class="col-sm-10">
                <select name="rombel_id" id="rombel_id" class="form-control">
                    <option selected hidden disabled>Pilih</option>
                    @foreach( $rombels as $rombel)
                    <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rayon_id" class="form-label">Rayon</label>
            <div class="col-sm-10">
                <select name="rayon_id" id="rayon_id" class="form-control">
                    <option selected hidden disabled>Pilih</option>
                    @foreach( $rayons as $rayon)
                    <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Kirim Data</button>
    </form>
@endsection