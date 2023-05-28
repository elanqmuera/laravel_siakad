{{-- @extends('layouts.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Tambah Jurusan</h4>
     <p class="card-description">
       Masukan data Jurusan
     </p>
     <form  action="{{route('jurusan.simpan')}}" method="POST" class="forms-sample">
      @csrf 
      <div class="form-group">
         <label for="exampleInputName1">Kode Jurusan</label>
         <input type="text" class="form-control @error('id_jurusan')is-invalid @enderror" value="{{ old('id_jurusan') }}" name="id_jurusan" id="id_jurusan" placeholder="Kode Jurusan">
         @error('id_jurusan')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
      <div class="form-group">
         <label for="exampleInputName1">Nama Jurusan</label>
         <input type="text" class="form-control @error('nama_jurusan')is-invalid @enderror" value="{{ old('nama_jurusan') }}" name="nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan">
         @error('nama_jurusan')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
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
                <form action="{{ route('jurusan.simpan') }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Tambah Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                        <label class="form-label required">Kode Kelas</label>
                                        <input type="text" class="form-control @error('id_jurusan')is-invalid @enderror"
                                            value="{{ old('id_jurusan') }}" name="id_jurusan" id="id_jurusan"
                                            placeholder="Kode Jurusan">
                                        @error('id_jurusan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                        <label class="form-label required">Nama Jurusan</label>
                                        <input type="text" class="form-control @error('nama_jurusan')is-invalid @enderror"
                                            value="{{ old('nama_jurusan') }}" name="nama_jurusan" id="nama_jurusan"
                                            placeholder="Nama Kelas">
                                        @error('nama_jurusan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
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