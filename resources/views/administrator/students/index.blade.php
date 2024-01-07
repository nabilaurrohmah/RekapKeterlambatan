@extends('layouts.template')

@section('content')
    <div class="jumbotron py-5 px-2">
        <h3>Data Siswa</h3>
        <a href="#" style="color: black;">Home /</a>
        <a href="{{route('students.index')}}" style="color: black;">Data Siswa </a>
        <hr class="my-1 mt-3">
    </div>
    <div class="container mt-4 p-4 bg-white rounded shadow">
        <div class="jumbotron py-3 px-2">
 <a href="{{ route('students.create') }}" class="btn btn-secondary">Tambah Data</a>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1; @endphp
            @foreach($students as $item)
            <tr>
                <td>{{($no++)}}</td>
                <td>{{$item->nis}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->rombel->rombel}}</td>
                <td>{{$item->rayon->rayon}}</td>
                <td class="d-flex"> 
                    <a href="" class="btn btn-primary me-3">Edit</a>
                    {{-- <form action="{{route('students.delete',$item['id']) }}" method="POST"> --}}
                    @csrf
                    @method('DELETE')
          
                   <button type="submit" class="btn btn-secondary">Hapus</button>
                </form>
                </td>
               
            </tr>
            @endforeach
          
        </tbody>
    </table>
    </div>
    </div>
</div>

    @endsection