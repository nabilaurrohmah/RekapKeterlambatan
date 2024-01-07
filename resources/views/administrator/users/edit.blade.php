@extends('layouts.template')

@section('content')
    <form action="{{ route('users.update', $user['id']) }}" method="POST" class="card p-5" style="width: 80%">
        @csrf
        @method('PATCH')
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
        <br>
        <div class="jumbroton py-2 px-1">
            <h4 class="display" style="color: black;">
                Edit Data User
            </h4>
            <p style="color: black;">Home / Data User</p>
        </div>
        <br>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name']}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="{{ $user['email']}}">
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
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Edit data</button>
    </form>
@endsection