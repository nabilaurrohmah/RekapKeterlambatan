@extends('layouts.template')

@section('content')
    <div class="jumbotron py-5 px-2">
        <h3>Detail Data Keterlambatan</h3>
        <a href="#" style="color: black;">Home /</a>
        <a href="#" style="color: black;">Data Keterlambatan /</a>
        <a href="#" style="color: black;">Detail Data Keterlambatan </a>
        <hr class="my-1 mt-3">
    </div>
    <div class="container mt-4 p-4 bg-white rounded shadow">
        <div class="jumbotron py-3 px-2">
 <a href="{{ route('lates.create') }}" class="btn btn-secondary">Tambah Data</a>
 <a href="{{ route('lates.create') }}" class="btn btn-secondary">Export Data Keterlambatan</a>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Jumlah Keterlambatan</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1; @endphp
            @foreach($lates as $item)
            <tr>
                <td>{{($no++)}}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jumlahketerlambatan }}</td>
                <td class="d-flex"> 
                    {{-- <form action="{{route('students.delete',$item['id']) }}" method="POST"> --}}
                    @csrf
                    @method('DELETE')
          
                   <button type="submit" class="btn btn-secondary">Lihat</button>
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