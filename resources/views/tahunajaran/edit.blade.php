@extends('layouts.app2')

@section('content2')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Form Tahun Ajaran
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('tahunajaran.update', $tahunajaran->id_tahunajaran) }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Edit Tahun Ajaran</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Nama Tahun Ajaran</label>
                                    <div>
                                        <input type="text"
                                            class="form-control @error('nama_tahunajaran')is-invalid @enderror"
                                            id="nama_tahunajaran" value="{{ $tahunajaran->nama_tahunajaran }}"
                                            name="nama_tahunajaran" placeholder="Masukan nama nama_tahunajaran">
                                        @error('nama_tahunajaran')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
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
