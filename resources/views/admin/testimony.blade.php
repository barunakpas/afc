@extends('admin.layouts.master')
@section('title', 'Testimony')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Testimony</h4>
            <p class="card-description">
              list <code>Testimony</code> <button class="btn btn-success right" data-toggle="modal" data-target="#modalTestimony"><span class="mdi mdi-plus"></span> Add New</button>
            </p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>image</th>
                  <th>Video</th>
                  <th>Product Related</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($datas as $data)
                <tr id="tr-{{$data->id}}">
                  <td><img src="{{ asset('image/testimony/'.$data->image) }}"></td>
                  <td>{{ $data->video }}</td>
                  <td>{{ $data->name == null ? '-' : $data->name }}</td>
                  <td>
                    @if($data->active == 0)
                    <label class="badge badge-danger">Not-active</label></td>
                    @else
                    <label class="badge badge-success">Active</label>
                    @endif
                  <td>
                    <a onclick="editTestimony({{$data->id}}, '{{$data->video}}', '{{$data->active}}', '{{$data->product_id}}')"><label class="badge badge-primary"><i class="mdi mdi-pencil"></i></label></a>  
                    <a onclick="messageDelete('{{$data->id}}')"><label class="badge badge-danger"><i class="mdi mdi-delete"></i></label></a>
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

  <div class="modal fade" id="modalTestimony" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Add New Testimony</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formTestimony" method="post" action="{{ route('testimony_create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Image *</label>
              <input type="file" class="dropify" name="images" >
            </div>
            <div class="form-group">
              <label for="video" class="col-form-label">Video Url:</label>
              <textarea class="form-control" rows="3" id="video" name="video"></textarea>
            </div>
            <div class="form-group">
              <label>Product Related:</label>
              <select class="form-control" id="product_id" name="product_id" style="width:100%">
                <option value="">[ Choose Product ]</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
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
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  <script type="text/javascript">
  
  function editTestimony(id, video, active, product_id) {

    if(active == 0){
      active = false
    }else{
      active = true
    }
    $('#ModalLabel').html('Edit Testimony #'+id);
    $('#formTestimony').attr('action', 'testimony/update/'+id);
    $('<input/>').attr({ type: 'hidden', id: '_method', name: '_method', value: 'PUT' }).appendTo('#formTestimony'); 
    $('#video').val(video); 
    $('#product_id').val(product_id);
    $('#active').prop('checked', active);
    $('#modalTestimony').modal('show');
    
  }

  function messageDelete(id) {
    swal({
        title: 'Are you sure?',
        text: "you want to delete Home Section #"+id,
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
              url: "testimony/delete/"+id,
              type: 'DELETE',
              success: function (response)
              {
                if(response.status == 200){
                  swal({
                    title: 'Delete Success!',
                    text: 'Delete Testimony Success',
                    icon: 'success'
                  })
                  $("#tr-"+id).remove();
                }else{
                  swal({
                    title: 'Delete Failed!',
                    text: 'Delete Testimony Failed',
                    icon: 'error'
                  })
                }
              },
              error: function(err){
                swal({
                  title: 'Delete Failed!',
                  text: 'Delete Testimony Failed',
                  icon: 'error'
                })
              }
          });
        }
      });
        
    }
  </script>
@endsection