@extends('layouts.template')

@section('content')
<div class="justify-content-start jumbotron py-3" style="line-height: 5px; padding-bottom:30px;">
  <a href="#" style="color: black;">Home</a>
  <a href="{{route('students.index')}}" style="color: black;">Data Keterlambatan /</a> 
  <a href="{{route('students.create')}}" style="color: black;">Tambah Data Siswa</a> 
</div>
    <form action="{{ route('lates.store') }}" class="card mt-3 p-5" method="POST">
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
            <label for="name" class="form-label">Siswa</label>
                <select name="name_id" id="name_id" class="form-select">
                    <option selected hidden disabled>Pilih Nama </option>
                @foreach ( $students as $item )
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </div>
        </div>
        <div class="mb-3 row">
            <label for="data_time_late" class="col-sm-2 col-form-label">Tanggal :</label>
               <input type="datetime-local" name="data_time_late" id="data_time_late" class="form-control" required
                    {{-- value="{{ data('Y-m-d\TH:i:s', strotime('now')) }}"> --}}
            </div>
        <div class="mb-3 row">
            <label for="information" class=" col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
                <input type="text" name="information" id="information" class="form-control" required>
            </div>
        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-label">Bukti :</label>
            <input type="file" name="bukti" id="bukti" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
        <button type="submit" class="btn btn-primary mt-3">Export Data Keterlambatan</button>

    </form>
@endsection