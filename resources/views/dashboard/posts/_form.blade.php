@csrf


<div class="form-group mb-4">
        <label class="col-md-12 p-0">Title</label>
        <div class="col-md-12 border-bottom p-0">
            <input name="title" type="text"
                   class="form-control p-0 border-0 text-start @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}">
            @error('title')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>



<div class="form-group mb-4">
    <label class="col-md-12 p-0">Description</label>
    <div class="col-md-12 border-bottom p-0">
        <textarea name="description" type="text"
                  class="form-control p-0 border-0 @error('description') is-invalid @enderror">{{ old('description', $post->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0">Image</label>
    <div class="col-md-12 border-bottom p-0">
        <input type="hidden" name="image_hidden_value" class="image_hidden_value"
               value="{{ $post->image }}">
        <input name="image" type="file" placeholder="image"
               class="form-control p-0 border-0 @error('image') is-invalid @enderror" onchange="loadPreview(this);"/>
        <div class="image-preview-container {{empty($post->image) ? '' : 'show'}}">
            <img id="preview_img"
                 src="{{ empty($post->image) ? '' : asset('storage/uploads/posts/' . $post->image) }}"
                 class="img-fluid object-cover h-full w-full object-center" />
        </div>
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<!-- <div>
    <button type="reset" class="btn btn-warning">Back</button>
    <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
</div> -->

<div class="form-group mb-4 d-flex gap-2">
    <button class="btn btn-success">{{$buttonText}}</button>
    <a href="{{route('posts.index')}}" class="btn btn-info">Cancel</a>
</div>
