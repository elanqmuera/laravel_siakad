@extends('layouts.app2')

@section('content2')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Form Nilai
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('nilai.simpan') }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Tambah Nilai</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="form-label required">Nama Tugas</label>
                                    <select class="form-control @error('id_tugas')is-invalid @enderror" id="id_tugas"
                                        name="id_tugas">
                                        @error('id_tugas')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        @foreach ($tugas as $item)
                                            <option value="{{ $item->id_tugas }}">{{ $item->nama_tugas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-label required">Nama Mahasiswa</label>
                                    <select class="form-control @error('id_mahasiswa')is-invalid @enderror"
                                        id="id_mahasiswa" name="id_mahasiswa">
                                        @error('id_mahasiswa')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        @foreach ($mahasiswa as $item)
                                            <option value="{{ $item->id_mahasiswa }}">{{ $item->nama_mahasiswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Nilai</label>
                                    <div>
                                        <input type="text" class="form-control @error('nilai')is-invalid @enderror"
                                            id="nilai" value="{{ old('nilai') }}" name="nilai"
                                            placeholder="Masukan nilai">
                                        @error('nilai')
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
