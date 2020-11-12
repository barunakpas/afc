@extends('admin.layouts.master')
@section('title', 'Product Benefit')
@section('content')
	<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $product->name }} - Section 6 (Benefit) </h4>
            <p class="card-description">
              list <code>Section 7</code> <button class="btn btn-success right" data-toggle="modal" data-target="#modalProduct"><span class="mdi mdi-plus"></span> Add New</button>
            </p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($datas as $data)
                <tr id="tr-{{$data->id}}">
                  <td>{{ $data->no }}</td>
                  <td><img src="{{ asset('image/product/'.$data->image) }}"></td>
                  <td>{{ $data->title }}</td>
                  <td>
                    @if($data->active == 0)
                    <label class="badge badge-danger">Not-active</label></td>
                    @else
                    <label class="badge badge-success">Active</label>
                    @endif
                  <td>
                    <a onclick="edit('{{$data->id}}', '{{$data->no}}','{{$data->title}}','{{$data->active}}','{{$data->image}}')"><label class="badge badge-primary"><i class="mdi mdi-pencil"></i></label></a>  
                    <a onclick="messageDelete('{{$data->id}}','{{$data->title}}')"><label class="badge badge-danger"><i class="mdi mdi-delete"></i></label></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table><br>
             <a href="{{ route('product_show', $product->id) }}">
              <button type="button" class="btn btn-dark mr-2">Back to Product</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formProduct" method="post" action="{{ route('product_benefit_create', $product->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Banner *</label>
              <input type="file" class="dropify" name="images" id="images">
            </div>
            <div class="form-group" id="label-title">
              <label for="no" class="col-form-label">No</label>
              <input type="number" class="form-control" id="no" name="no">
            </div>
            <div class="form-group" id="label-title">
              <label for="title" class="col-form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title">
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
  <script type="text/javascript">
    $('.dropify').dropify();
    function edit(id, no, title, active, image) {
      var url = '{{ route("product_benefit_update", ":id") }}';
      url = url.replace(':id', id);
      
      if(active == 0){
        active = false
      }else{
        active = true
      }
      $('#ModalLabel').html('Edit #'+title);
      $('#formProduct').attr('action', url);
      $('<input/>').attr({ type: 'hidden', id: '_method', name: '_method', value: 'PUT' }).appendTo('#formProduct');
      $('#title').val(title);
      $('#no').val(no);
      $('#active').prop('checked', active);
      $('#modalProduct').modal('show');
    }

    function messageDelete(id, name) {
      var url = '{{ route("product_benefit_delete", ":id") }}';
      url = url.replace(':id', id);
      swal({
          title: 'Are you sure?',
          text: "you want to delete product benefit "+name,
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
                url: url,
                type: 'DELETE',
                success: function (response)
                {
                  if(response.status == 200){
                    swal({
                      title: 'Delete Success!',
                      text: 'Delete Product Benefit '+name+' Success',
                      icon: 'success'
                    })
                    $("#tr-"+id).remove();
                  }else{
                    swal({
                      title: 'Delete Failed!',
                      text: 'Delete Product Benefit '+name+' Failed',
                      icon: 'error'
                    })
                  }
                },
                error: function(err){
                  swal({
                    title: 'Delete Failed!',
                    text: 'Delete Product Benfit '+name+' Failed',
                    icon: 'error'
                  })
                }
            });
          }
        });
        
    }
  </script>
@endsection