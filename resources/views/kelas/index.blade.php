@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')

    <div class="card-body">
        <h4 class="card-title"> </h4>

        <a href="{{ route('kelas.tambah') }}" class="btn btn-primary mr-2">Tambah Kelas</a> <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                 @php ($no = 1)
                     @foreach ($database as $item)
                     <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item ->nama_kelas }}</td>
                        <td>
                           <a class="btn btn-primary" href="{{route('kelas.edit',$item->id_kelas) }}">Edit</a>
                           <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" href="{{route('kelas.hapus',$item->id_kelas) }}" >Hapus</a>
                        </td>
                       </tr>
                     @endforeach
              
               
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
