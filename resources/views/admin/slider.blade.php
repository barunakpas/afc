@extends('admin.layouts.master')
@section('title', 'Home Slider')
@section('content')
	<div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Home Slider</h4>
              <p class="card-description">
                update home slider your website
              </p>
              <form class="forms-sample" method="post" action="{{ route('admin_slider_update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="2">{{ $data->description }}</textarea>
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
@endsection