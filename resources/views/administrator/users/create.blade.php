@extends('layouts.template')

@section('content')
    <div class="jumbroton py-2 px-1">
        <h4 class="display" style="color: black;">
            Tambah Data User
        </h4>
        <p style="color: black;">Home / Data User</p>
    </div>
    <br>
    <form action="{{ route('users.store')}}" method="POST" class="card p-5" style="width: 80%">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select name="role" id="role" class="form-control">
                    <option selected disabled hidden>Pilih</option>
                    <option value="admin">admin</option>
                    <option value="ps">pembimbing siswa</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah data</button>
    </form>
@endsection