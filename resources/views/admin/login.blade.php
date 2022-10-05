<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name') }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="d-block">
            <x-messages/>
          </div>
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{asset('admin/images/logo.svg')}}" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              {{-- form start --}}
              <form class="pt-3" method="POST" action="{{route('admin.login')}}">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Username">
                  @if ($errors)
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                  @if ($errors)
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  @endif
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
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

<!-- plugins:js -->
<script src="{{asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{asset('admin/js/dataTables.select.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin/js/off-canvas.js') }}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{asset('admin/js/template.js') }}"></script>
<script src="{{asset('admin/js/settings.js') }}"></script>
<script src="{{asset('admin/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->
</body>

</html>

