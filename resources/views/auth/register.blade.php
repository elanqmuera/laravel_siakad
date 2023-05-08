<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Siakad MI</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('skydash/template')}}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('skydash/template')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('skydash/template')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('skydash/template')}}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('skydash/template')}}/images/logo-polsub.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('skydash/template')}}/images/logo-polsub.png"  alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form action="{{ route('register.simpan')}}" method="POST" class="pt-3">
                @csrf
                <div class="form-group">
                    <label for="nama_mahasiswa"> Nama Mahasiswa</label>
                  <input name="nama_mahasiswa" type="text" class="form-control form-control-lg @error('nama_mahasiswa')is-invalid @enderror"  id="nama_mahasiswa" placeholder="Nama Mahasiswa">
                  @error('nama_mahasiswa')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="nim"> Nomor Induk Mahasiswa</label>
                  <input name="nim" type="text" class="form-control form-control-lg @error('nim')is-invalid @enderror" id="nim" placeholder="Nomor Induk Mahasiswa">
                  @error('nim')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                  <select  name="gender" id="gender" class="form-control form-control-lg " >
                  
                    <option value="laki-laki"{{ old('gender') == 'laki-laki' ? 'selected' : null }}>Laki - Laki</option>
                    <option  value="perempuan"{{ old('gender') == 'perempuan' ? 'selected' : null }}>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                  <input name="password" type="password" class="form-control form-control-lg @error('password')is-invalid @enderror" id="password" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback">{{ $message }}</span>
              @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control form-control-lg" id="foto" placeholder="foto">
                  </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register </button>
               
                <div class="text-center mt-4 font-weight-light">
                  Sudah punya akun? <a href="login.html" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('skydash/template')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('skydash/template')}}/js/off-canvas.js"></script>
  <script src="{{ asset('skydash/template')}}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('skydash/template')}}/js/template.js"></script>
  <script src="{{ asset('skydash/template')}}/js/settings.js"></script>
  <script src="{{ asset('skydash/template')}}/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
