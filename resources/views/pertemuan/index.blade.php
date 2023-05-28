@extends('layouts.app2')

@section('title', 'Data Pertemuan')

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
                <a href="{{ route('pertemuan.tambah') }}" class="btn btn-primary mr-2">Tambah Pertemuan</a> <br> <br>

                <div class="row row-deck row-cards">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Data Pertemuan</h3>
                            </div>

                            <div class="table-responsive">
                                <table id="id_pertemuan" class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertemuan</th>
                                            <th>deskripsi</th>
                                            <th>Matkul</th>
                                            <th> Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no = 1)
                                        @foreach ($pertemuan as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->pertemuan }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>{{ $item->nama_matkul }}</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('pertemuan.edit', $item->id_pertemuan) }}">Edit</a>
                                                    <a class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"
                                                        href="{{ route('pertemuan.hapus', $item->id_pertemuan) }}">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var t = $('#id_pertemuan').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                stateSave: true,


            });

        });
    </script>

    <script>
        toastr.success('Have fun', 'Miracle Max Says')
    </script>


@endsection
