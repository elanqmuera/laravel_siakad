@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')

    <div class="card-body">
        <h4 class="card-title"> </h4>

        <a href="{{ route('mahasiswa.tambah') }}" class="btn btn-primary mr-2">Tambah Mahasiswa</a> <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No </th>
                        <th>NIM</th>
                        <th> Nama Mahasiswa </th>
                        <th> Email </th>
                        <th> Jenis Kelamin</th>
                        <th>Foto</th>
                        <th> Password</th>
                        <th> Kelas</th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                 @php ($no = 1)
                     @foreach ($database as $item)
                     <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item ->nim }}</td>
                        <td>{{ $item ->nama_mahasiswa }}</td>
                        <td>{{ $item ->email }}</td>
                        <td>{{ $item ->gender }}</td>
                        <td>{{ $item ->foto }}</td>
                        <td>{{ $item ->password }}</td>
                        <td>{{ $item ->nama_kelas}}</td>
                       
                        {{-- <td>{{ $dataKelas->nama_kelas}}</td> --}}
                    
                        
                        {{-- <td>{{ $item ->nama_matkul }}</td> --}}
                        <td>
                           <a class="btn btn-primary" href="{{route('mahasiswa.edit',$item->id_mahasiswa) }}">Edit</a>
                           <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" href="{{route('mahasiswa.hapus',$item->id_mahasiswa) }}" id="hapus">Hapus</a>
                        </td>
                       </tr>
                     @endforeach
              
               
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
