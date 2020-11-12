@extends('admin.layouts.master')
@section('title', 'Product')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <h4 class="card-title">{{ $data->name }} - Section</h4>
            <p class="text-muted ml-auto">Manage</p>
          </div>
          <div class="row">
            <div class="col-md-12">

              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 1</strong> </span>
                  <a href="#" onclick="editAll(1, {{$data->id}}, '{{$data->title}}', '{{$data->description}}', '{{$data->banner}}')"><span class="text-small text-muted">Edit</span></a>
                </div>
              </div>
              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 2</strong> </span>
                  <a href="#" onclick="editAll(2, {{$data->id}}, '{{$data->title_1}}', '{{$data->description_1}}', '{{$data->image}}')"><span class="text-small text-muted">Edit</span></a>
                </div>
              </div>
              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 3</strong> </span>
                  <a href="{{ route('admin_product_resolve', $data->id) }}" target="_blank"><span class="text-small text-muted">Show</span></a>
                </div>
              </div>
              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 4</strong> </span>
                  <a href="#" onclick="editAll(4, {{$data->id}}, '', '', '{{$data->banner_1}}')"><span class="text-small text-muted">Edit</span></a>
                </div>
              </div>

              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 5</strong> </span>
                  <a href="#" onclick="editAll(5, {{$data->id}}, '{{$data->title_2}}', '{{$data->description_2}}', '{{$data->banner_2}}')"><span class="text-small text-muted">Edit</span></a>
                </div>
              </div>

              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 6</strong> </span>
                  <a href="{{ route('admin_paten_resolve', $data->id) }}" target="_blank"><span class="text-small text-muted">Show</span></a>
                </div>
              </div>

              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 7</strong> </span>
                  <a href="{{ route('admin_benefit_resolve', $data->id) }}" target="_blank"><span class="text-small text-muted">Show</span></a>
                </div>
              </div>

              <div class="list">
                <div class="d-flex justify-content-between pb-3 mt-2 border-bottom">
                  <span class="text-small"><strong>Section 8</strong> </span>
                  <a href="#" onclick="editAll(8, {{$data->id}}, '{{$data->title_3}}', '', '{{$data->banner_3}}')"><span class="text-small text-muted">Edit</span></a>
                </div>
              </div>

            </div>
          </div><br>
          <a href="{{ route('admin_product') }}">
            <button type="button" class="btn btn-dark mr-2">Back to Product</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAll" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAll" method="post" action="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label>Banner *</label>
              <input type="file" class="dropify" name="images" id="images">
            </div>
            <div class="form-group" id="label-title">
              <label for="title" class="col-form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group" id="label-desc">
              <label for="description" class="col-form-label">description</label>
              <textarea class="form-control" rows="5" id="description" name="description"></textarea>
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
    function editAll(section, id, title, description, image) {
      $('.dropify').dropify({
        defaultFile: "{{ asset('image/product') }}"+"/"+image
      });

      $('#ModalLabel').html('Edit Section #'+section);
      if(section == 1){
        $('#formAll').attr('action', '{{ route("product_update_section1") }}?id='+id);
      }else if(section == 2){
        $('#formAll').attr('action', '{{ route("product_update_section2") }}?id='+id);
      }else if(section == 4){
        $("#label-title").hide();
        $("#label-desc").hide();
        $('#formAll').attr('action', '{{ route("product_update_section4") }}?id='+id);
      }else if(section == 5){
        $('#formAll').attr('action', '{{ route("product_update_section5") }}?id='+id);
      }else if(section == 8){
        $("#label-desc").hide();
        $('#formAll').attr('action', '{{ route("product_update_section8") }}?id='+id);
      }else{
        $('#formAll').attr('action', 'product/update/section-1/'+id);
      }
      $('#title').val(title);
      $('#description').val(description); 
      $('#modalAll').modal('show');
    }

    </script>

@endsection