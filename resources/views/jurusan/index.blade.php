{{-- @extends('layouts.app')

@section('title', 'Data Jurusan')

@section('content')

    <div class="card-body">
        <h4 class="card-title"> </h4>
        @if(Session('success'))
              <div class="alert alert-success">
                <h6 class="font-weight-light">{{ Session('success')}}</h6>
              </div>
              @endif
        <a href="{{ route('jurusan.tambah') }}" class="btn btn-primary mr-2">Tambah Jurusan</a> <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                 @php ($no = 1)
                     @foreach ($jurusan as $item)
                     <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item ->id_jurusan }}</td>
                        <td>{{ $item ->nama_jurusan }}</td>
                        <td>
                           <a class="btn btn-primary" href="{{route('jurusan.edit',$item->id) }}">Edit</a>
                           <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" href="{{route('jurusan.hapus',$item->id) }}" >Hapus</a>
                        </td>
                       </tr>
                     @endforeach
              
               
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection --}}


@extends('layouts.app2')

@section('title', 'Data Jurusan')
    
@section('content2')
   
    <div class="page-wrapper">
       <!-- Page header -->
      
       <!-- Page body -->
       <div class="page-body">
         <div class="container-xl">
           <a href="{{route('jurusan.tambah')}}" class="btn btn-primary mr-2">Tambah Jurusan</a> <br> <br>
           <div class="row row-deck row-cards">
               
             <div class="col-12">
               
               <div class="card">
                   
                 <div class="card-header">
                   <h3 class="card-title">Data Jurusan</h3>
                 </div>
              
                 <div class="table-responsive">
                   <table id="id_jurusan" class="table card-table table-vcenter text-nowrap datatable">
                     <thead>
                       <tr>
                         <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                         </th>
                         <th>Kode Jurusan</th>
                         <th> Nama Jurusan</th>
                         <th>Aksi</th>
                       </tr>
                     </thead>
                     <tbody>
                        @php ($no = 1)
                            @foreach ($jurusan as $item)
                            <tr>
                               <td>{{ $no++}}</td>
                               <td>{{ $item ->id_jurusan }}</td>
                               <td>{{ $item ->nama_jurusan }}</td>
                              
                               {{-- <td>{{ $dataKelas->nama_kelas}}</td> --}}
                           
                               
                               {{-- <td>{{ $item ->nama_matkul }}</td> --}}
                               <td>
                                  <a class="btn btn-primary" href="{{route('jurusan.edit',$item->id) }}">Edit</a>
                                  <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" href="{{route('jurusan.hapus',$item->id) }}" id="hapus">Hapus</a>
                               </td>
                              </tr>
                            @endforeach
                   </table>
                 </div>
                 {{-- <div class="card-footer d-flex align-items-center">
                  <div >
                {{ $database->links('pagination::bootstrap-5')}}
                 </div>
              </div> --}}
                 {{-- <div class="card-footer d-flex align-items-center">
                   <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                   <ul class="pagination m-0 ms-auto">
                     <li class="page-item disabled">
                       <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                         <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                         prev
                       </a>
                     </li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item active"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                     <li class="page-item">
                       <a class="page-link" href="#">
                         next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                       </a>
                     </li>
                   </ul>
                 </div> --}}
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <script>
      $(document).ready(function () {
       var t = $('#id_jurusan').DataTable({
          rowReorder: {
              selector: 'td:nth-child(2)'
          },
          responsive: true,
          stateSave: true,
    
    
      });
     
     });
     </script>
@endsection

