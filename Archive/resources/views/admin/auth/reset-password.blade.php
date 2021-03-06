<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reset Password | Wendri</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/endors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/puse-icons-feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth login-full-bg">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <div class="auth-form-dark text-left p-5">
              <h2 class="text-center">Reset Password</h2>
              <form class="pt-5" method="post" action="{{ route('password_reset_action') }}">
              	@csrf
                <input type="hidden" name="token" class="form-control" id="toke" value="{{ $token }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email', $_GET['email']) }}" required>
                  <i class="mdi mdi-account"></i>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                  <i class="mdi mdi-eye"></i>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirmation Password</label>
                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                  <i class="mdi mdi-eye"></i>
                </div>
                <div class="mt-5">
                  <button type="submit" class="btn btn-block btn-facebook btn-lg font-weight-medium">Submit</a>
                </div>
                <div class="mt-3 text-center">
                  <a href="{{ route('admin_login') }}" class="auth-link text-white">Login?</a>
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
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('admin/vendors/js/vendor.bundle.addons.js') }}"></script>
  <script src="{{ asset('admin/js/toastDemo.js') }}"></script>

  @if(Session::has('alert'))
  <script type="text/javascript">
    showNotifToast('{{ Session::get('alert')['0'] }}', '{{ Session::get('alert')['1'] }}', '{{ Session::get('alert')['2'] }}');
  </script>
  @endif
</body>

</html>
