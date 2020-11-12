@extends('admin.layouts.master')
@section('title', 'Social Media')
@section('content')
	<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Social Media</h4>
            <p class="card-description">
              list <code>social-media</code> <button class="btn btn-success right" data-toggle="modal" data-target="#modalSosmed" data-whatever="@mdo"><span class="mdi mdi-plus"></span> Add New</button>
            </p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Social Media Name</th>
                  <th>Social Media Url</th>
                  <th>Social Media Icon</th>
                  <th>Status</th>
                  <th>Last Update</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($datas as $data)
                <tr id="tr-{{$data->id}}">
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->url }}</td>
                  <td><i class="mdi {{ $data->icon }}"></i></td>
                  <td>
                    @if($data->active == 0)
                    <label class="badge badge-danger">Not-active</label></td>
                    @else
                    <label class="badge badge-success">Active</label>
                    @endif
                  <td>{{ $data->updated_at }}</td>
                  <td>
                    <a onclick="editSosmed('{{$data->id}}','{{$data->name}}','{{$data->url}}','{{$data->icon}}','{{$data->active}}')"><label class="badge badge-primary"><i class="mdi mdi-pencil"></i></label></a>  
                    <a onclick="messageDelete('{{$data->id}}','{{$data->name}}')"><label class="badge badge-danger"><i class="mdi mdi-delete"></i></label></a>
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

  <div class="modal fade" id="modalSosmed" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Add New Sosmed</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formSosmed" method="post" action="{{ route('admin_sosmed_action') }}">
            @csrf
            <div class="form-group">
              <label for="name" class="col-form-label">Name *</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="url" class="col-form-label">Url *</label>
              <input type="text" class="form-control" id="url" name="url" required>
            </div>
            <div class="form-group">
              <label>Icon:</label>
              <select class="form-control" id="icon" name="icon" style="width:100%">
                <option value="mdi-facebook">Facebook</option>
                <option value="mdi-instagram">Instagram</option>
                <option value="mdi-youtube">Youtube</option>
                <option value="mdi-twitter">Twitter</option>
                <option value="mdi-pinterest">Pinterest</option>
              </select>
            </div>
            <div class="form-group">
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="active" name="active">
                    Active
                  </label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
  <script src="{{ asset('admin/js/select2.js') }}"></script>
  <script type="text/javascript">
    function editSosmed(id, name, url, icon, active) {
      if(active == 0){
        active = false
      }else{
        active = true
      }
      $('#ModalLabel').html('Edit Sosmed #'+name);
      $('#formSosmed').attr('action', 'social-media/update/'+id);
      $('<input/>').attr({ type: 'hidden', id: '_method', name: '_method', value: 'PUT' }).appendTo('#formSosmed');
      $('#name').val(name);
      $('#url').val(url);  
      $('#icon').val(icon); 
      $('#active').prop('checked', active);
      $('#modalSosmed').modal('show');
    }

    function messageDelete(id, name) {
      swal({
          title: 'Are you sure?',
          text: "you want to delete sosial media "+name,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3f51b5',
          cancelButtonColor: '#ff4081',
          confirmButtonText: 'Great ',
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
                url: "social-media/delete/"+id,
                type: 'DELETE',
                success: function (response)
                {
                  if(response.status == 200){
                    swal({
                      title: 'Delete Success!',
                      text: 'Delete Sosial Media '+name+' Success',
                      icon: 'success'
                    })
                    $("#tr-"+id).remove();
                  }else{
                    swal({
                      title: 'Delete Failed!',
                      text: 'Delete Sosial Media '+name+' Failed',
                      icon: 'error'
                    })
                  }
                },
                error: function(err){
                  swal({
                    title: 'Delete Failed!',
                    text: 'Delete Sosial Media '+name+' Failed',
                    icon: 'error'
                  })
                }
            });
          }
        });
        
    }
  </script>
@endsection