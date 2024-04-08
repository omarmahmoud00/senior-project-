<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ URL::asset('adminDashboard/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('adminDashboard/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('adminDashboard/css/style.css') }}">
  <!-- Correct way to include favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('adminDashboard/images/favicon.png') }}">
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                {{-- Ensure the path to your logo is correct --}}
                {{-- <img src="{{ URL::asset('path/to/your/logo.svg') }}" alt="logo"> --}}
              </div>
              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

              <h1>Welcome Back</h1>
              <br>
              <h3 class="font-weight-light">Enter your Info</h3>

              <form class="pt-3" method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" aria-label="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">

                </div>

                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Sign In</button>
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
  <!-- base:js -->

  <script src="{{ URL::asset('adminDashboard/js/template.js') }}"></script>
  <script src="{{ URL::asset('adminDashboard/js/hoverable-collapse.js') }}"></script>
  <script src="{{ URL::asset('adminDashboard/js/off-canvas.js') }}"></script>
  <script src="{{ URL::asset('adminDashboard/js/jquery.cookie.js') }}"></script>
  <script src="{{ URL::asset('adminDashboard/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
</body>

</html>
