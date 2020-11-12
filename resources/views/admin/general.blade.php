@extends('admin.layouts.master')
@section('title', 'General Setting')
@section('content')
	<div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">General Setting</h4>
              <p class="card-description">
                setting your website
              </p>
              <form id="form-general" method="post" action="{{ route('admin_general_update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="exampleInputName1">Website Name *</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Website Name" value="{{ $data->name }}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Email *</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $data->email }}" required>
                </div>
                <div class="form-group">
	                <label for="exampleInputEmail3">No. Handphone *</label>
	                <div class="input-group">
	                  <div class="input-group-prepend">
	                    <span class="input-group-text">+62</span>
	                  </div>
	                  <input type="number" id="phone" name="phone" class="form-control" value="{{ $data->phone }}" required>
	                </div>
	            </div>
                <div class="form-group">
	                <label for="exampleInputEmail3">No. Whatsapp *</label>
	                <div class="input-group">
	                  <div class="input-group-prepend">
	                    <span class="input-group-text">+62</span>
	                  </div>
	                  <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{ $data->whatsapp }}" required>
	                </div>
	            </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Address</label>
                  <textarea class="form-control" id="address" rows="2" name="address">{{ $data->address }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Map</label>
                  <input class="form-control" id="map" name="map" value="{{ $data->map }}"/>
                </div>
                <div class="form-group">
                  <label>Upload Logo *</label>
                  <input type="file" class="dropify" name="logo" data-default-file="{{ asset('/image/'.$data->logo) }}"/>
                </div>
                <div class="form-group">
                  <label>Upload Favicon *</label>
                  <input type="file" class="dropify" name="favicon" data-default-file="{{ asset('/image/'.$data->favicon) }}" />
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