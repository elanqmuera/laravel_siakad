@extends('layouts.app2')

@section('title', 'Data Dosen')

@section('content2')

    <div class="page-wrapper">
        <!-- Page header -->

        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                @if (Session('success'))
                    <h6 class="alert alert-success">{{ Session('success') }}</h6>
                @endif
                @if (Session('successUpdate'))
                    <div class="alert alert-succes">
                        <h6 class="btn btn-success">{{ Session('successUpdate') }}</h6>
                    </div>
                @endif
                @if (Session('successHapus'))
                    <div class="alert alert-danger">
                        <h6 class="btn btn-danger">{{ Session('successHapus') }}</h6>
                    </div>
                @endif
                <a href="{{ route('mahasiswa.tambah') }}" class="btn btn-primary mr-2">Tambah Mahasiswa</a> <br> <br>
                <div class="row row-deck row-cards">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Data Mahasiswa</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div>

                                    <div class="my-3 col-12 col-sm-8 col-md-4">
                                        <form action="" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="keyword"
                                                    placeholder="Keyword">
                                                <button class="input-group-text btn btn-primary"> Search </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="id_mahasiswa" class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th class="w-1">No.
                                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6 15l6 -6l6 6" />
                                                </svg>
                                            </th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Email Address</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Foto</th>
                                            <th>Password</th>
                                            <th> Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no = 1)
                                        @foreach ($mahasiswa as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->nim }}</td>
                                                <td>{{ $item->nama_mahasiswa }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->gender }}</td>
                                                <td>{{ $item->foto }}</td>
                                                <td>{{ $item->password }}</td>
                                                <td>{{ $item->nama_kelas }}</td>

                                                {{-- <td>{{ $dataKelas->nama_kelas}}</td> --}}


                                                {{-- <td>{{ $item ->nama_matkul }}</td> --}}
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('mahasiswa.edit', $item->id_mahasiswa) }}">Edit</a>
                                                    <a class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"
                                                        href="{{ route('mahasiswa.hapus', $item->id_mahasiswa) }}"
                                                        id="hapus">Hapus</a>
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
        $(document).ready(function() {
            var t = $('#id_mahasiswa').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                stateSave: true,


            });

        });
    </script>
@endsection
