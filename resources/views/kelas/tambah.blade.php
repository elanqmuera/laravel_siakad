@extends('layouts.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Tambah Kelas</h4>
     <p class="card-description">
       Masukan data kelas
     </p>
     <form  action="{{route('kelas.simpan')}}" method="POST" class="forms-sample">
      @csrf 
      <div class="form-group">
         <label for="exampleInputName1">Nama Kelas</label>
         <input type="text" class="form-control @error('nama_kelas')is-invalid @enderror" value="{{ old('nama_kelas') }}" name="nama_kelas" id="nama_kelas" placeholder="Nama Dosen">
         @error('nama_kelas')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
       <button type="submit" class="btn btn-primary mr-2">Simpan</button>
     </form>
   </div>
 </div>
</div>
@endsection

