@extends('layouts.app2')

@section('content2')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Form Pertemuan
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('pertemuan.update', $pertemuan->id_pertemuan) }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Edit Pertemuan</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Nama Pertemuan</label>
                                    <div>
                                        <input type="text" class="form-control @error('pertemuan')is-invalid @enderror"
                                            id="pertemuan" value="{{ $pertemuan->pertemuan }}" name="pertemuan"
                                            placeholder="Masukan nama pertemuan">
                                        @error('pertemuan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Deskripsi</label>
                                    <div>
                                        <input type="text" class="form-control @error('deskripsi')is-invalid @enderror"
                                            id="deskripsi" value="{{ $pertemuan->deskripsi }}" name="deskripsi"
                                            placeholder="Masukan nama deskripsi">
                                        @error('deskripsi')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="form-label required">Mata Kuliah</label>
                                    <select class="form-control @error('id_matkul')is-invalid @enderror" id="id_matkul"
                                        name="id_matkul">
                                        @error('id_matkul')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <option value="{{ $pertemuan->id_matkul }}">{{ $pertemuan->nama_matkul }}</option>
                                        @foreach ($matkul as $item)
                                            <option value="{{ $item->id_matkul }}">{{ $item->nama_matkul }}</option>
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
