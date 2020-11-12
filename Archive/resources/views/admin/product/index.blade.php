@extends('admin.layouts.master')
@section('title', 'Product')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Product <a href="{{ route('product_ceate') }}"><button class="btn btn-success right"><span class="mdi mdi-plus"></span> Add New</button></a></h4>

      <div class="row">
        <div class="col-12">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Whatsapp Message</th>
                  <th>Promo Price</th>
                  <th>Price</th>
                  <th>Last Update</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)
              <tr id="tr-{{$data->id}}">
                  <td>{{$no++}}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->whatsapp_message }}</td>
                  <td>{{ number_format($data->promo_price) }}</td>
                  <td>{{ number_format($data->price) }}</td>
                  <td>{{ $data->updated_at }}</td>
                  <td>
                    @if($data->active == 0)
                      <label class="badge badge-danger">Not-Active</label>
                    @else
                      <label class="badge badge-success">Active</label>
                    @endif                    
                  </td>
                  <td>
                    <a href="{{ route('product_edit', $data->id) }}"><label class="badge badge-info"><i class="mdi mdi-pencil"></i></label></a>
                    <a href="#" onclick="messageDelete('{{$data->id}}', '{{$data->name}}')"><label class="badge badge-danger"><i class="mdi mdi-delete"></i></label>
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
  <script src="{{ asset('admin/js/data-table.js') }}"></script>
  <script type="text/javascript">
    function messageDelete(id, name) {
      swal({
          title: 'Are you sure?',
          text: "you want to delete Product `"+name+"`",
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
                url: "product/delete/"+id,
                type: 'DELETE',
                success: function (response)
                {
                  if(response.status == 200){
                    swal({
                      title: 'Delete Success!',
                      text: 'Delete Product '+name+' Success',
                      icon: 'success'
                    })
                    $("#tr-"+id).remove();
                  }else{
                    swal({
                      title: 'Delete Failed!',
                      text: 'Delete Product '+name+' Failed',
                      icon: 'error'
                    })
                  }
                },
                error: function(err){
                  swal({
                    title: 'Delete Failed!',
                    text: 'Delete Product '+name+' Failed',
                    icon: 'error'
                  })
                }
            });
          }
        });
        
    }
  </script>
@endsection