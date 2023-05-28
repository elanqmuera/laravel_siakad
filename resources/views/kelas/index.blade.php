@extends('layouts.app2')

@section('title', 'Data Kelas')

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
                <a href="{{ route('kelas.tambah') }}" class="btn btn-primary mr-2">Tambah Kelas</a> <br> <br>
                <div class="row row-deck row-cards">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Data Kelas</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="table-responsive">
                                    <table id="myTable" class="display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Kelas</th>
                                                <th>Nama Kelas</th>
                                                <th>Tahun Ajaran</th>
                                                <th> Aksi </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($no = 1)
                                            @foreach ($kelas as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->id_kelas }}</td>
                                                    <td>{{ $item->nama_kelas }}</td>
                                                    <td>{{ $item->nama_tahunajaran }}</td>
                                                    <td>
                                                        <a class="btn btn-success"
                                                            href="{{ route('kelas.detail', $item->id_kelas) }}">Lihat</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('kelas.edit', $item->id) }}">Edit</a>
                                                        <a class="btn btn-danger"
                                                            onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"
                                                            href="{{ route('kelas.hapus', $item->id) }}">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    <div>
                                        {{-- {{ $dataDosen->links('pagination::bootstrap-5')}} --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var t = $('#myTable').DataTable({
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    responsive: true,
                    stateSave: true,


                });

            });
        </script>
    @endsection
