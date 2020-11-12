@extends('admin.layouts.master')
@section('title', 'Create Home Section')
@section('styles')
  <link rel="stylesheet" href="{{ asset('admin/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Home Section Create</h4>
            <p class="card-description">
              complete form for create new home section
            </p>
            <form class="forms-sample" method="post" action="{{ route('home_section_store') }}" enctype="multipart/form-data">
              @csrf
              @include('admin.home-section._form')
              <button type="submit" class="btn btn-facebook mr-2">Submit</button>
              <a href="{{ route('admin_home_section') }}"><button type="button" class="btn btn-dark mr-2">Back</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  <script src="{{ asset('admin/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>

  <script type="text/javascript">
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