@extends('admin.layouts.master')
@section('title', 'FAQ')
@section('content')
	<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">FAQ</h4>
              <p class="card-description">
                list <code>social-media</code> <button class="btn btn-success right" data-toggle="modal" data-target="#modalFaq"><span class="mdi mdi-plus"></span> Add New</button>
              </p>
              <br>
              <div class="accordion" id="accordion-3" role="tablist">
                @foreach($datas as $data)
                <div class="card" id="card-faq-{{$data->id}}">
                  <div class="card-header" role="tab" id="headingOne-{{ $data->id }}">
                    <h5 class="mb-0">
                      <a data-toggle="collapse" href="#collapseOne-{{ $data->id }}" aria-expanded="false" aria-controls="collapseOne-{{ $data->id }}" class="collapsed">
                        {{ $data->question }} - 
                        @if($data->active == 0)
                        <label class="badge badge-danger" style="margin:0px">Not-active</label>
                        @else
                        <label class="badge badge-success" style="margin:0px">Active</label>
                        @endif
                        <label class="badge badge-dark" style="margin:0px">{{ $data->is_sort }}</label>
                      </a>
                    </h5>
                  </div>
                  <div id="collapseOne-{{ $data->id }}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{ $data->id }}" data-parent="#accordion-{{ $data->id }}" style="">
                    <div class="card-body">
                      {{ $data->answer }}
                      
                        <a href="#" onclick="editSosmed('{{$data->id}}','{{$data->question}}','{{$data->answer}}','{{$data->is_sort}}','{{$data->active}}')" style="display: inline;padding:0px;"><span class="mdi mdi-pencil"></span></a>  
                        <a href="#" onclick="messageDelete('{{$data->id}}')" style="display: inline;padding:0px;"><span class="mdi mdi-delete"></span></a>

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

  <div class="modal fade" id="modalFaq" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Add New FAQ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formFaq" method="post" action="{{ route('faq_create') }}">
            @csrf
            <div class="form-group">
              <label for="question" class="col-form-label">Question *</label>
              <textarea class="form-control" rows="2" id="question" name="question" required></textarea>
            </div>
            <div class="form-group">
              <label for="answer" class="col-form-label">Answer *</label>
              <textarea class="form-control" rows="5" id="answer" name="answer" required></textarea>
            </div>
            <div class="form-group">
              <label for="is_sort" class="col-form-label">Sort:</label>
              <input type="number" class="form-control" id="is_sort" name="is_sort">
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
    function editSosmed(id, question, answer, is_sort, active) {
      if(active == 0){
        active = false
      }else{
        active = true
      }
      $('#ModalLabel').html('Edit Sosmed #'+id);
      $('#formFaq').attr('action', 'faq/update/'+id);
      $('<input/>').attr({ type: 'hidden', id: '_method', name: '_method', value: 'PUT' }).appendTo('#formFaq');
      $('#question').val(question);
      $('#answer').val(answer);  
      $('#is_sort').val(is_sort); 
      $('#active').prop('checked', active);
      $('#modalFaq').modal('show');
    }

    function messageDelete(id) {
      swal({
          title: 'Are you sure?',
          text: "you want to FAQ #"+id,
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
                url: "faq/delete/"+id,
                type: 'DELETE',
                success: function (response)
                {
                  if(response.status == 200){
                    swal({
                      title: 'Delete Success!',
                      text: 'Delete FAQ Success',
                      icon: 'success'
                    })
                    $("#card-faq-"+id).remove();
                  }else{
                    swal({
                      title: 'Delete Failed!',
                      text: 'Delete FAQ Failed',
                      icon: 'error'
                    })
                  }
                },
                error: function(err){
                  swal({
                    title: 'Delete Failed!',
                    text: 'Delete FAQ Failed',
                    icon: 'error'
                  })
                }
            });
          }
        });
        
    }
  </script>
@endsection