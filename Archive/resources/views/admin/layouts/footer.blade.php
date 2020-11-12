  <!-- plugins:js -->
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('admin/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('admin/js/misc.js') }}"></script>
  <script src="{{ asset('admin/js/settings.js') }}"></script>
  <!-- End plugin js for this page-->
  <script src="{{ asset('admin/js/alerts.js') }}"></script>
  <script src="{{ asset('admin/js/toastDemo.js') }}"></script>

  @if(Session::has('alert'))
  <script type="text/javascript">
    showNotifToast('{{ Session::get('alert')['0'] }}', '{{ Session::get('alert')['1'] }}', '{{ Session::get('alert')['2'] }}');
  </script>
  @endif