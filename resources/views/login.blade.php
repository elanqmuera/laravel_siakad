<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Siakad MI</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('skydash/template/') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('skydash/template/') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('skydash/template/') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('skydash/template/') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('skydash/template/') }}/images/logo-polsub.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('skydash/template/') }}/images/logo.svg" alt="logo">
                            </div>
                            <h4>Selamat Datang</h4>

                            @if (Session('gagal'))
                                <div class="alert alert-danger">
                                    <h6 class="font-weight-light">{{ Session('gagal') }}</h6>
                                </div>
                            @endif
                            @if (Session('success'))
                                <div class="alert alert-success">
                                    <h6 class="font-weight-light">{{ Session('success') }}</h6>
                                </div>
                            @endif
                            <form class="pt-3" action="/login" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for=""> NIP atau NIK</label>
                                    <input type="text" value="{{ old('nip') }}"
                                        class="form-control form-control-lg @error('nip')is-invalid @enderror"
                                        id="nip" name="nip" placeholder="Masukan Nip atau Nik">
                                    @error('nip')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password"
                                        class="form-control form-control-lg @error('password')is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                                </div>

                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Lupa password?</a>
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
    <script src="{{ asset('skydash/template/') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('skydash/template/') }}/js/off-canvas.js"></script>
    <script src="{{ asset('skydash/template/') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('skydash/template/') }}/js/template.js"></script>
    <script src="{{ asset('skydash/template/') }}/js/settings.js"></script>
    <script src="{{ asset('skydash/template/') }}/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
