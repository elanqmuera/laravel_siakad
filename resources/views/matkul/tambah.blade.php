{{-- @extends('layouts.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Tambah Mata Kuliah</h4>
     <p class="card-description">
       Masukan data mata kuliah
     </p>
     <form  action="{{route('matkul.simpan')}}" method="POST" class="forms-sample">
      @csrf 
      <div class="form-group">
        <label for="exampleInputName1">Kode Mata Kuliah</label>
        <input type="text" class="form-control @error('id_matkul')is-invalid @enderror" value="{{ old('id_matkul') }}" name="id_matkul" id="id_matkul" placeholder="Nama Mata Kuliah">
        @error('id_matkul')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
       </div>
      <div class="form-group">
         <label for="exampleInputName1">Nama Mata Kuliah</label>
         <input type="text" class="form-control @error('nama_matkul')is-invalid @enderror" value="{{ old('nama_matkul') }}" name="nama_matkul" id="nama_matkul" placeholder="Nama Mata Kuliah">
         @error('nama_matkul')
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
                            Form Mata Kuliah
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="{{ route('matkul.simpan') }}" method="POST" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Tambah Mata Kuliah</h4>
                    </div>
                    <div class="card-body">
                        <form class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Kode Mata Kuliah</label>
                                    <div>
                                        <input type="text" class="form-control @error('nim')is-invalid @enderror"
                                            id="id_matkul" value="{{ old('id_matkul') }}" name="id_matkul" placeholder="Masukan kode matkul">
                                        @error('id_matkul')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Nama Mata Kuliah</label>
                                    <div>
                                        <input type="text" class="form-control @error('nama_matkul')is-invalid @enderror"
                                            id="nama_matkul" value="{{ old('nama_matkul') }}" name="nama_matkul" placeholder="Masukan nama mata kuliah">
                                        @error('nama_matkul')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                  <label for="form-label required">Dosen Pengampu</label>
                                    <select class="form-control @error('id_matkul')is-invalid @enderror" id="id_matkul" name="id_matkul">
                                      @error('id_matkul')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            @foreach ($dosenMatkul as $item)
                                            <option value="{{$item ->id_matkul }}">{{ $item->nama_dosen }}</option>
                                            @endforeach
                                    </select>
                                  </div> --}}
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

