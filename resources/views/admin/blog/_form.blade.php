
                <div class="form-group">
                  <label for="title">Title *</label>
                  <input type="text" class="form-control" id="title" name="title" minlength="2" value="{{ old('title', isset($data) ? $data->title : '') }}" required>
                </div>
                <div class="form-group">
                  <label>Image * (max 1mb)</label>
                  <input type="file" class="dropify" id="images" name="images" data-default-file="{{ isset($data) ? asset('image/blog/'.$data->image) : '' }}">
                </div>
                <div class="form-group">
                  <label for="sort_desc">Sort Description *</label>
                  <input type="text" class="form-control" id="sort_desc" name="sort_desc" minlength="2" value="{{ old('sort_desc', isset($data) ? $data->sort_desc : '') }}" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" name="descriptions" class="summernote" required>
                    {!! isset($data) ? $data->desc : '' !!}
                  </textarea>
                </div>
                <div class="form-group">
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="active" name="active" @if(isset($data) && $data->active == true) checked @endif>
                      Active
                    </label>
                  </div>
                </div>