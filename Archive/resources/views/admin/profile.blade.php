@extends('admin.layouts.master')
@section('title', 'Profile')
@section('content')
  <div class="content-wrapper">
    <div class="row user-profile">
      <div class="col-lg-12 side-right stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
              <h4 class="card-title mb-0">Profile</h4>
              <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Security</a>
                </li>
              </ul>
            </div>
            <div class="wrapper">
              <hr>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                  <form name="myForm" method="post" action="{{ route('admin_profile_update', $data->id) }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                      <label for="mobile">Job</label>
                      <input type="text" class="form-control" id="job" name="job" value="{{ $data->job }}">
                    </div>
                    <div class="form-group">
                      <label>Photo</label>
                      <input type="file" class="dropify" name="photo" data-default-file="{{ asset('/image/'.$data->photo) }}">
                    </div>
                    <div class="form-group mt-5">
                      <button type="submit" class="btn btn-success mr-2">Update</button>
                    </div>
                  </form>
                </div><!-- tab content ends -->
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                  <form method="post" action="{{ route('admin_profile_password', $data->id) }}" onsubmit="return validateForm()">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <label for="password">Change password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                      <label for="password">Confirmation Password</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="form-group mt-5">
                      <button type="submit" class="btn btn-success mr-2">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  <script type="text/javascript">
  </script>
@endsection