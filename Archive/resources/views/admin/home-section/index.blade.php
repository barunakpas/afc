@extends('admin.layouts.master')
@section('title', 'Home Section')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Home Section</h4>
            <p class="card-description">
              list <code>home section</code> <a href="{{ route('home_section_create') }}"><button class="btn btn-success right"><span class="mdi mdi-plus"></span> Add New</button></a>
            </p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Image Location</th>
                  <th>Background Color</th>
                  <th>Status</th>
                  <th>Sort</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($datas as $data)
                <tr id="tr-{{$data->id}}">
                  <td>{{ $data->title }}</td>
                  <td>{{ $data->type == 1 ? 'With Image' : 'Not Use Image' }}</td>
                  <td>
                    @if($data->type == 1)
                    {{ $data->img_loc == 1 ? 'Left' : 'Right' }}
                    @else
                      -
                    @endif
                  </td>
                  <td>{{ $data->bg_color == 1 ? 'white' : 'Light' }}</td>
                  <td>
                    @if($data->active == 0)
                    <label class="badge badge-danger">Not-active</label></td>
                    @else
                    <label class="badge badge-success">Active</label>
                    @endif
                  <td>{{ $data->is_sort }}</td>
                  <td>
                    <a href="{{ route('home_section_edit', $data->id) }}"><label class="badge badge-primary"><i class="mdi mdi-pencil"></i></label></a>  
                    <a onclick="messageDelete('{{$data->id}}','{{$data->title}}')"><label class="badge badge-danger"><i class="mdi mdi-delete"></i></label></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
  <script type="text/javascript">

  function messageDelete(id, title) {
    swal({
        title: 'Are you sure?',
        text: "you want to delete Home Section #"+title,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Yes! ',
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true
          }
        }
      }).then(function(willDelete) {
        if(willDelete == true){
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax(
          {
              url: "home-section/delete/"+id,
              type: 'DELETE',
              success: function (response)
              {
                if(response.status == 200){
                  swal({
                    title: 'Delete Success!',
                    text: 'Delete Home Section Success',
                    icon: 'success'
                  })
                  $("#tr-"+id).remove();
                }else{
                  swal({
                    title: 'Delete Failed!',
                    text: 'Delete Home Section Failed',
                    icon: 'error'
                  })
                }
              },
              error: function(err){
                swal({
                  title: 'Delete Failed!',
                  text: 'Delete Home Section Failed',
                  icon: 'error'
                })
              }
          });
        }
      });
        
    }
  </script>
@endsection