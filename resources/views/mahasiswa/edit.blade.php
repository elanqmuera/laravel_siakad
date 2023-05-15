@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Edit Mahasiswa</h4>
     <p class="card-description">
       Masukan data mahasiswa
     </p>
     <form  action="{{route('mahasiswa.update', $database[0]->id_mahasiswa)}}" method="POST" class="forms-sample">
      @csrf 
      <div class="form-group">
        <label for="exampleInputName1">NIM</label>
        <input type="text" value="{{ $database[0]->nim }}" class="form-control @error('nim')is-invalid @enderror" id="nim" name="nim" placeholder="nim">
        @error('nim')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
      </div>
      <div class="form-group">
         <label for="exampleInputName1">Nama Mahasiswa</label>
         <input type="text" value="{{ $database[0]->nama_mahasiswa }}" class="form-control @error('nama_mahasiswa')is-invalid @enderror" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Dosen">
         @error('nama_mahasiswa')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email</label>
            <input type="text" value="{{ $database[0]->email }}" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="Alamat Email">
            @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
           </div>
       <div class="form-group">
        <label for="gender">Jenis Kelamin</label>
          <select class="form-control @error('gender')is-invalid @enderror" id="gender" name="gender">
            @error('gender')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
            <option value="laki-laki" @if ($database[0]->gender == 'laki-laki') selected @endif>Laki - laki</option>
            <option value="perempuan"@if ($database[0]->gender == 'perempuan') selected @endif>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="foto" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
            <span class="input-group-append">
              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
            </span>
          </div>
        </div>
       <div class="form-group">
         <label for="password">Password</label>
         <input type="text" value="{{ $database[0]->password }}" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password">
         @error('password')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
       <button type="submit" class="btn btn-primary mr-2">Simpan</button>
     </form>
   </div>
 </div>
</div>
@endsection

