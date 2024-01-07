@extends('layouts.template')

@section('content')
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('rayons.update', $rayons['id']) }}" method="POST" class="card p-5" style="width: 80%">
            <div class="mb-3 row">
                <label for="rayon" class="col-sm-2 col-form-label">Rayon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="rayon" name="rayon">
                </div>
            </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Pembimbing Siswa: </label>
            <div class="col-sm-10">
                <select name="user_id" class="form-control form-control-select">
                    @foreach(\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ubah</button>
        </form>
        @endsection

           