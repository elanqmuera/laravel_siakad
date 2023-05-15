@extends('layouts.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Edit Dosen</h4>
     <p class="card-description">
       Masukan data dosen
     </p>
     <form  action="{{route('dosen.update', $database[0]->id_dosen)}}" method="POST" class="forms-sample">
      @csrf 
      <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text"  value="{{ $database[0]->nip }}" class="form-control @error('nip')is-invalid @enderror" id="nip" name="nip" placeholder="NIP">
        @error('nip')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
      </div>
      <div class="form-group">
         <label for="nama_dosen">Nama Dosen</label>
         <input type="text"  value="{{ $database[0]->nama_dosen }}" class="form-control @error('nama_dosen')is-invalid @enderror" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen">
         @error('nama_dosen')
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
            <option value="perempuan" @if ($database[0]->gender == 'perempuan') selected @endif>Perempuan</option>
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
         <input type="password"  value="{{ $database[0]->password }}" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password">
         @error('password')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email"  value="{{ $database[0]->email }}" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="email">
          @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
      @enderror
         </div>
       <button type="submit" class="btn btn-primary mr-2">Simpan</button>
     </form>
   </div>
 </div>
</div>
@endsection

