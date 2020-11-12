@extends('admin.layouts.master')
@section('title', 'About')
@section('styles')
  <link rel="stylesheet" href="{{ asset('admin/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
  <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">About</h4>
              <p class="card-description">
                update about your website
              </p>
              <form class="forms-sample" method="post" action="{{ route('about_update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="summernote" id="descriptions" name="descriptions">{!! $data->description !!}</textarea>
                </div>
                <div class="form-group">
                  <label>Banner</label>
                  <input type="file" class="dropify" name="banner" data-default-file="{{ asset('/image/'.$data->banner) }}">
                </div>
                <button type="submit" class="btn btn-facebook mr-2">Update</button>
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