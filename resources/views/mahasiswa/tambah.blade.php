@extends('layouts.app2')

@section('content2')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Form Mahasiswa
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('mahasiswa.simpan') }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Tambah Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">NIM</label>
                                    <div>
                                        <input type="text" class="form-control @error('nim')is-invalid @enderror"
                                            id="nim" value="{{ old('nim') }}" name="nim"
                                            placeholder="Masukan NIM mahasiswa">
                                        @error('nim')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Nama Mahasiswa</label>
                                    <div>
                                        <input type="text"
                                            class="form-control @error('nama_mahasiswa')is-invalid @enderror"
                                            id="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" name="nama_mahasiswa"
                                            placeholder="Masukan nama dosen">
                                        @error('nama_mahasiswa')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Alamat Email</label>
                                    <div>
                                        <input type="email" class="form-control @error('email')is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="Masukan alamat email">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label required">Jenis Kelamin</label>
                                    <div>
                                        <select class="form-select @error('gender')is-invalid @enderror" id="gender"
                                            name="gender" value="{{ old('gender') }}">
                                            @error('gender')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <option value="laki-laki">Laki - laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Foto</label>
                                    <div>
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Password</label>
                                    <div>
                                        <input type="password" value="{{ old('password') }}" name="password"
                                            class="form-control @error('password')is-invalid @enderror" id="password"
                                            placeholder="Masukan password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="form-label required">Kelas</label>
                                    <select class="form-control @error('id_kelas')is-invalid @enderror" id="id_kelas"
                                        name="id_kelas">
                                        @error('id_kelas')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
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
