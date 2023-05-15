 @extends('layouts.app')

 @section('title', 'Data Dosen')
     
 @section('content')
     <div class="card-body">
         <h4 class="card-title"> </h4>

         <a href="{{route('dosen.tambah')}}" class="btn btn-primary mr-2">Tambah Dosen</a> <br>
         <div class="table-responsive">
             <table class="table table-striped">
                 <thead>
                     <tr>
                         <th>No </th>
                         <th>NIP</th>
                         <th> Nama Dosen </th>
                         <th> Jenis Kelamin</th>
                         <th>Email Address</th>
                         <th>Foto</th>
                         <th> Password</th>
                         <th> Aksi </th>
                     </tr>
                 </thead>
                 <tbody>
                  @php ($no = 1)
                      @foreach ($dataDosen as $item)
                      <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item ->nip }}</td>
                        <td>{{ $item ->nama_dosen }}</td>
                        <td>{{ $item ->gender }}</td>
                        <td>{{ $item ->email }}</td>
                        <td>{{ $item ->foto }}</td>
                      
                        <td>{{ $item ->password }}</td>
                        <td>
                          <a class="btn btn-primary" href="{{ route('dosen.edit', $item->id_dosen) }}">Edit</a>
                          <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" href="{{route('dosen.hapus',$item->id_dosen) }}" >Hapus</a>
                        </td>
                       </tr>     
                      @endforeach
               
                
                     
                 </tbody>
             </table>
         </div>
     </div>
 @endsection
