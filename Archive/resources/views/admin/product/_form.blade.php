
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name" name="name" minlength="2" value="{{ old('name', isset($data) ? $data->name : '') }}" required>
                </div>
                <div class="form-group">
                  <label for="title">Title *</label>
                  <input type="text" class="form-control" id="title" name="title" minlength="2" value="{{ old('title', isset($data) ? $data->title : '') }}" required>
                </div>
                <div class="form-group">
                  <label for="video">Video Url</label>
                  <input type="text" class="form-control" id="video" name="video" value="{{ old('video', isset($data) ? $data->video : '') }}" >
                </div>
                <div class="form-group">
                  <label for="whatsapp_message">Whatsapp Message</label>
                  <textarea class="form-control" id="whatsapp_message" name="whatsapp_message" rows="3">{{ old('whatsapp_message', isset($data) ? $data->whatsapp_message : '' )  }}</textarea>
                </div>
                <div class="form-group">
                  <label for="promo_price">Promo Price</label>
                  <input type="number" class="form-control" id="promo_price" name="promo_price" value="{{ old('promo_price', isset($data) ? $data->promo_price : 0) }}">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" value="{{ old('price', isset($data) ? $data->price : 0) }}">
                </div>
                <div class="form-group">
                  <label>Image * (max 1mb)</label>
                  <input type="file" class="dropify" id="images" name="images" data-default-file="{{ isset($data) ? asset('image/product/'.$data->image) : '' }}">
                </div>
                <div class="form-group">
                  <label>Banner * (max 1mb)</label>
                  <input type="file" class="dropify" id="banners" name="banners" data-default-file="{{ isset($data) ? asset('image/product/'.$data->banner) : '' }}">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" name="descriptions" class="summernote" required>
                    {!! isset($data) ? $data->description : '' !!}
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