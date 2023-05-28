@extends('layouts.app2')

@section('content2')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Form Tugas
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('tugas.update', $tugas->id_tugas) }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Tambah Tugas</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Nama Tugas</label>
                                    <div>
                                        <input type="text" class="form-control @error('nama_tugas')is-invalid @enderror"
                                            id="nama_tugas" value="{{ $tugas->nama_tugas }}" name="nama_tugas"
                                            placeholder="Masukan nama tugas">
                                        @error('nama_tugas')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Deskripsi</label>
                                    <div>
                                        <input type="text" class="form-control @error('deskripsi')is-invalid @enderror"
                                            id="deskripsi" value="{{ $tugas->deskripsi }}" name="deskripsi"
                                            placeholder="Masukan nama deskripsi">
                                        @error('deskripsi')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="form-label required">Pertemuan</label>
                                    <select class="form-control @error('id_pertemuan')is-invalid @enderror"
                                        id="id_pertemuan" name="id_pertemuan">
                                        @error('id_pertemuan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <option value="{{ $tugas->id_pertemuan }}">{{ $tugas->pertemuan }}</option>
                                        @foreach ($pertemuan as $item)
                                            <option value="{{ $item->id_pertemuan }}">{{ $item->pertemuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-label required">Nama Dosen</label>
                                    <select class="form-control @error('id_dosen')is-invalid @enderror" id="id_dosen"
                                        name="id_dosen">
                                        @error('id_dosen')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <option value="{{ $tugas->id_dosen }}">{{ $tugas->nama_dosen }}</option>
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->id_dosen }}">{{ $item->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
