@extends('layouts.app2')

@section('title', 'Data Kelas')

@section('content2')

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kelas {{ $namakelas ? $namakelas->nama_kelas : '' }} </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Angkatan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no = 1)
                                    @foreach ($kelasmahasiswa as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(./static/avatars/006m.jpg)"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $item->nama_mahasiswa }}</div>
                                                        <div class="text-muted"><a href="#"
                                                                class="text-reset">{{ $item->nim }}</a></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                - {{-- {{ $dataKelas->tahun_ajaran }} --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
