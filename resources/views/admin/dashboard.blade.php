@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')  
  <div class="content-wrapper">

    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                <div class="wrapper d-flex align-items-center justify-content-center">
                  <div class="btn social-btn btn-twitter btn-rounded d-inline-block"><i class="mdi mdi-eye"></i></div>
                  <div class="wrapper d-flex flex-column ml-4">
                    <p class="font-weight-bold mb-2">Website View</p>
                    <p class="mb-0 text-muted">3 Views</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                <div class="wrapper d-flex align-items-center justify-content-center">
                  <div class="btn social-btn btn-facebook btn-rounded d-inline-block"><i class="mdi mdi-bookmark"></i></div>
                  <div class="wrapper d-flex flex-column ml-4">
                    <p class="font-weight-bold mb-2">Product</p>
                    <p class="mb-0 text-muted">{{ $noProduct }} Unit</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                <div class="wrapper d-flex align-items-center justify-content-center">
                  <div class="btn social-btn btn-google btn-rounded d-inline-block"><i class="mdi mdi-newspaper"></i></div>
                  <div class="wrapper d-flex flex-column ml-4">
                    <p class="font-weight-bold mb-2">News</p>
                    <p class="mb-0 text-muted">{{ $noNews }} isues</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-3 col-sm-6 d-flex justify-content-between justify-content-md-center">
                <div class="wrapper d-flex align-items-center justify-content-center">
                  <div class="btn social-btn btn-warning btn-rounded d-inline-block"><i class="mdi mdi-package"></i></div>
                  <div class="wrapper d-flex flex-column ml-4">
                    <p class="font-weight-bold mb-2">Package</p>
                    <p class="mb-0 text-muted">{{ $noPackage }} isues</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Product Favorite</h4>
            <div id="morris-donut-example"></div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Product</h4>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>Asigned Name</th>
                  <th>View</th>
                  <th>Promo Price</th>
                  <th>Price</th>
                </tr>
                @foreach($products as $product)
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div><img src="{{ asset('image/product/'.$product->image) }}" alt="{{ $product->name }}"></div>
                      <div class="ml-3">
                        <p class="mb-1">{{ $product->name }}</p>
                        <small class="text-muted">({{ $product->active == 0 ? 'Not-active' : 'Active' }})</small>
                      </div>
                    </div>
                  </td>
                  <td>{{ $product->view }} view</td>
                  <td>Rp. {{ number_format($product->promo_price) }}</td>
                  <td>Rp. {{ number_format($product->price) }}</td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
@section('scripts')
  
  <!-- inject:js -->
  <script src="{{ asset('admin/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('admin/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
    if ($("#morris-donut-example").length) {
      Morris.Donut({
        element: 'morris-donut-example',
        colors: ['#76C1FA', '#F36368', '#63CF72', '#FABA66'],
        data: {!! json_encode($tempProdJosn) !!}
      });
    }
  </script>
@endsection