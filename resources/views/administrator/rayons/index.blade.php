@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="my-5 d-flex justify-content-end">
            <a href="{{ route('rayons.create') }}" class="btn btn-secondary">Tambah Rayon</a>
        </div>

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('succses') }}</div>
            @endif
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
        <table class="table table-striped table-bordered table-hover" style="width: 80%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rayon</th>
                    <th>Pembimbing Rayon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($rayons as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['rayon'] }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('rayons.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                            <form action="{{ route('rayons.delete', $item['id'])}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
@endsection