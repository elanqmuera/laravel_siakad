@extends('layouts.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
     <h4 class="card-title">Tambah Mahasiswa</h4>
     <p class="card-description">
       Masukan data mahasiswa
     </p>
     <form  action="{{route('mahasiswa.simpan')}}" method="POST" class="forms-sample">
      @csrf 
      <div class="form-group">
        <label for="exampleInputName1">NIM</label>
        <input type="text" class="form-control @error('nim')is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}" placeholder="nim">
        @error('nim')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
      </div>
      <div class="form-group">
         <label for="exampleInputName1">Nama Mahasiswa</label>
         <input type="text" class="form-control @error('nama_mahasiswa')is-invalid @enderror" value="{{ old('nama_mahasiswa') }}" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Dosen">
         @error('nama_mahasiswa')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email</label>
            <input type="text" class="form-control @error('email')is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Alamat Email">
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
            <option value="laki-laki" {{ old('gender')== 'laki-laki' ? 'selected' : null }}>Laki - laki</option>
            <option value="perempuan" {{ old('gender')== 'perempuan' ? 'selected' : null }}>Perempuan</option>
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
         <input type="password" name="password" value="{{ old('password')}}" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password">
         @error('password')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
        <div class="form-group">
          <label for="id_kelas">Kelas</label>
            <select class="form-control @error('id_kelas')is-invalid @enderror" id="id_kelas" name="id_kelas">
              @error('id_kelas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    @foreach ($dataKelas as $item)
                    <option value="{{ $item ->id_kelas }}">{{ $item->nama_kelas }}</option>
                    @endforeach
            </select>
          </div>
       <div class="form-group">
         <label for="id_matkul">Mata Kuliah</label>
         <input type="id_matkul" name="id_matkul" value="{{ old('id_matkul')}}" class="form-control @error('id_matkul')is-invalid @enderror" id="id_matkul" placeholder="Mata Kuliah">
         @error('id_matkul')
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror
        </div>
       <button type="submit" class="btn btn-primary mr-2">Simpan</button>
     </form>
   </div>
 </div>
</div>
@endsection

