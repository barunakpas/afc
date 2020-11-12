<div class="form-group">
  <label>Image *</label>
  <input type="file" class="dropify" name="images" data-default-file="{{ isset($data) ? asset('image/home-section/'.$data->image) : '' }}">
</div>
<div class="form-group">
  <label for="name" class="col-form-label">Title *:</label>
  <input type="text" class="form-control" id="title" name="title" value="{{ old('title', isset($data) ? $data->title : '') }}" required>
</div>
<div class="form-group">
  <label for="description" class="col-form-label">Description:</label>
  <textarea class="summernote" rows="10" id="description" name="description">{!! old('description', isset($data) ? $data->description : '') !!}</textarea>
</div>
<div class="form-group">
  <label>Type:</label>
  <select class="form-control" id="type" name="type" style="width:100%">
    <option value="1" @if(isset($data) && $data->type == 1) selected @endif>With Image</option>
    <option value="2" @if(isset($data) && $data->type == 2) selected @endif>Not With Image</option>
  </select>
</div>
<div class="form-group">
  <label>Image Location:</label>
  <select class="form-control" id="img_loc" name="img_loc" style="width:100%">
    <option value="1" @if(isset($data) && $data->img_loc == 1) selected @endif>Left</option>
    <option value="2" @if(isset($data) && $data->img_loc == 2) selected @endif>Right</option>
  </select>
</div>
<div class="form-group">
  <label>Background Color:</label>
  <select class="form-control" id="bg_color" name="bg_color" style="width:100%">
    <option value="1" @if(isset($data) && $data->bg_color == 1) selected @endif>White</option>
    <option value="2" @if(isset($data) && $data->bg_color == 2) selected @endif>Light</option>
  </select>
</div>
<div class="form-group">
  <label for="is_sort" class="col-form-label">Sort:</label>
  <input type="number" class="form-control" id="is_sort" name="is_sort" value="{{ old('is-sort', isset($data) ? $data->is_sort : 0) }}">
</div>
<div class="form-group">
  <div class="form-check form-check-flat">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="active" name="active" @if(isset($data) && $data->active == 1) checked @endif>
      Active
    </label>
  </div>
</div>
<div class="form-group">
  <div class="form-check form-check-flat">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="after_product" name="after_product" @if(isset($data) && $data->after_product == 1) checked @endif>
      After Hone
    </label>
  </div>
</div>
