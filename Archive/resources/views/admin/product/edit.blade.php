@extends('admin.layouts.master')
@section('title', 'Update Product')
@section('styles')
  <link rel="stylesheet" href="{{ asset('admin/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
  <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Product Update #{{ $data->id }}</h4>
              <p class="card-description">
                update form for update product
              </p>
              <form class="forms-sample" method="post" action="{{ route('product_update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                @include('admin.product._form')
                <button type="submit" class="btn btn-facebook mr-2">Submit</button>
                <a href="{{ route('admin_product') }}"><button type="button" class="btn btn-dark mr-2">Back</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  <script src="{{ asset('admin/js/form-validation.js') }}"></script>
  <script src="{{ asset('admin/js/bt-maxLength.js') }}"></script>
  <script src="{{ asset('admin/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>

  <script type="text/javascript">
    $("#images").prop('required',false);
    $("#banners").prop('required',false);
    $(document).ready(function() {
         $('.summernote').summernote({
          height: 300,
          dialogsInBody: true,
          callbacks:{
              onInit:function(){
              $('body > .note-popover').hide();
              }
           },
       });
    });
</script>
@endsection