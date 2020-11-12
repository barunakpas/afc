@extends('admin.layouts.master')
@section('title', 'Package')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="container text-center pt-5">
              <h4 class="mt-5">Package</h4>  
                <br>
              <button class="btn btn-success" data-toggle="modal" data-target="#modalPackage"><span class="mdi mdi-plus"></span> Add New Package</button>
              </p>
              <br>
              <div class="row pricing-table">
                @foreach($datas as $data)
                <div class="col-md-4 grid-margin stretch-card pricing-card" id="package-{{ $data->id }}">
                  <div class="card @if($data->highlight == 0) border-primary @else border-success @endif border pricing-card-body">
                    <div class="text-center pricing-card-head">
                      <img src="{{ asset('image/package/'.$data->image) }}" alt="{{ $data->name }}" style="margin-bottom: 30px; width: 100%">
                      <h4>{{ $data->name }}</h4>
                      <p>{{ $data->sort_desc }}</p>
                      <h4 class="font-weight-normal mb-4" style="text-decoration: line-through; color:red">Rp. {{ number_format($data->promo_price) }}</h4>
                      
                      <h3 class="font-weight-normal mb-4">Rp. {{ number_format($data->price) }}</h3>
                    </div>
                    @if($data->active == 0)
                    <label class="badge badge-danger" style="position: absolute; top: 10px; left: 10px">Not-Active</label>
                    @else
                    <label class="badge badge-success" style="position: absolute; top: 10px; left: 10px">Active</label>
                    @endif
                    <div class="wrapper">
                      <a href="#" onclick="editSosmed('{{$data->id}}', '{{$data->name}}', '{{$data->sort_desc}}', '{{$data->price}}', '{{$data->promo_price}}', '{{$data->is_sort}}', '{{$data->active}}', '{{$data->highlight}}', '{{$data->image}}','{{$data->whatsapp_message}}')" class="btn btn-outline-primary btn-block">Update</a>
                      <a href="#" onclick="messageDelete('{{$data->id}}','{{$data->name}}')" class="btn btn-outline-danger btn-block">Delete</a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalPackage" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Add New Package</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formPackage" method="post" action="{{ route('package_create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Banner *</label>
              <input type="file" class="dropify" name="images" id="images">
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">Package Name *:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="sort_desc" class="col-form-label">Sort Description:</label>
              <textarea class="form-control" rows="2" id="sort_desc" name="sort_desc"></textarea>
            </div>
            <div class="form-group">
              <label for="promo_price" class="col-form-label">Promo Price:</label>
              <input type="number" class="form-control" id="promo_price" name="promo_price" value="0">
            </div>
            <div class="form-group">
              <label for="price" class="col-form-label">Price:</label>
              <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
              <label for="whatsapp_message" class="col-form-label">Whatsapp Message:</label>
              <textarea class="form-control" rows="5" id="whatsapp_message" name="whatsapp_message" required></textarea>
            </div>
            <div class="form-group">
              <label for="is_sort" class="col-form-label">Sort:</label>
              <input type="number" class="form-control" id="is_sort" name="is_sort">
            </div>
            <div class="form-group">
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" id="highlight" name="highlight">
                  Highlight Package
                </label>
              </div>
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
    function editSosmed(id, name, sort_desc, price, promoPrice, is_sort, active, highlight, image, whatsappMessage) {
      if(active == 0){
        active = false
      }else{
        active = true
      }
      if(highlight == 0){
        highlight = false
      }else{
        highlight = true
      }
      $('#ModalLabel').html('Edit Package #'+id);
      $('#formPackage').attr('action', 'package/update/'+id);
      $('<input/>').attr({ type: 'hidden', id: '_method', name: '_method', value: 'PUT' }).appendTo('#formPackage');
      $('#name').val(name);
      $('#sort_desc').val(sort_desc); 
      $('#promo_price').val(promoPrice);
      $('#whatsapp_message').val(whatsappMessage); 
      $('#price').val(price);  
      $('#is_sort').val(is_sort); 
      $('#active').prop('checked', active);
      $('#highlight').prop('checked', highlight);
      $('#modalPackage').modal('show');
      $('#images').attr("data-default-file", "{{ asset('image/package') }}"+"/"+image);
    }

    function messageDelete(id, name) {
      swal({
          title: 'Are you sure?',
          text: "you want to delete package #"+name,
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
                url: "package/delete/"+id,
                type: 'DELETE',
                success: function (response)
                {
                  if(response.status == 200){
                    swal({
                      title: 'Delete Success!',
                      text: 'Delete Package Success',
                      icon: 'success'
                    })
                    $("#package-"+id).remove();
                  }else{
                    swal({
                      title: 'Delete Failed!',
                      text: 'Delete Package Failed',
                      icon: 'error'
                    })
                  }
                },
                error: function(err){
                  swal({
                    title: 'Delete Failed!',
                    text: 'Delete Package Failed',
                    icon: 'error'
                  })
                }
            });
          }
        });
        
    }
  </script>
@endsection