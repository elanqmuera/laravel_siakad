{{-- @extends('layouts.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Edit Kelas</h4>
     <p class="card-description">
       Masukan data kelas
     </p>
     <form  action="{{route('kelas.update', $database[0]->id)}}" method="POST" class="forms-sample">
      @csrf 
      <div class="form-group">
        <label for="exampleInputName1">Id Kelas</label>
        <input type="text" class="form-control @error('id_kelas')is-invalid @enderror" id="id_kelas" name="id_kelas"  value="{{ $database[0]->id_kelas }}" placeholder="id_kelas">
        @error('id_kelas')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
      </div>
      <div class="form-group">
         <label for="exampleInputName1">Nama Kelas</label>
         <input type="text" class="form-control @error('nama_kelas')is-invalid @enderror"  value="{{ $database[0]->nama_kelas }}" name="nama_kelas" id="nama_kelas" placeholder="Nama Dosen">
         @error('nama_kelas')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>

        <div class="form-group">
          <label for="keaktifan">Keterangan</label>
            <select class="form-control @error('keaktifan')is-invalid @enderror" id="keaktifan" name="keaktifan">
              @error('keaktifan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
              <option value="Aktif" @if ($database[0]->keaktifan == 'Aktif') selected @endif>Aktif</option>
              <option value="Tidak Aktif"@if ($database[0]->keaktifan == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
            </select>
          </div>
       <button type="submit" class="btn btn-primary mr-2">Simpan</button>
     </form>
   </div>
 </div>
</div>
@endsection --}}


@extends('layouts.app2')

@section('content2')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Form Kelas
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Tambah Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Kode Kelas</label>
                                    <input type="text" class="form-control @error('id_kelas')is-invalid @enderror"
                                        value="{{ $kelas->id_kelas }}" name="id_kelas" id="id_kelas"
                                        placeholder="Nama Kelas">
                                    @error('id_kelas')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Nama Kelas</label>
                                    <input type="text" class="form-control @error('nama_kelas')is-invalid @enderror"
                                        value="{{ $kelas->nama_kelas }}" name="nama_kelas" id="nama_kelas"
                                        placeholder="Nama Kelas">
                                    @error('nama_kelas')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="form-label required">Tahun Ajaran</label>
                                    <select class="form-control @error('id_tahunajaran')is-invalid @enderror"
                                        id="id_tahunajaran" name="id_tahunajaran">
                                        @error('id_tahunajaran')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <option value="{{ $kelas->id_tahunajaran }}">
                                            {{ $kelas->nama_tahunajaran }}</option>
                                        @foreach ($tahunajaran as $item)
                                            <option value="{{ $item->id_tahunajaran }}">{{ $item->nama_tahunajaran }}
                                            </option>
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
