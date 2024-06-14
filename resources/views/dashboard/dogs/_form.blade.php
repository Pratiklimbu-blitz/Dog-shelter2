@csrf
<div class="form-group mb-4">
        <label class="col-md-12 p-0">Name</label>
        <div class="col-md-12 border-bottom p-0">
            <input name="name" type="text" placeholder="Dog Name"
                   class="form-control p-0 border-0 text-start @error('name') is-invalid @enderror" value="{{ old('name', $dog->name) }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>

    
<div class="form-group mb-4">
    <label class="col-md-12 p-0">Description</label>
    <div class="col-md-12 border-bottom p-0">
        <textarea name="description" type="text" placeholder="Description"
                  class="form-control p-0 border-0 @error('description') is-invalid @enderror">{{ old('description', $dog->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group mb-4">
    <label class="col-sm-12">Status</label>
    <div class="col-sm-12 border-bottom">
        <?php
        $dogStatusList = \App\Constants\DogStatus::LIST;
        ?>
        <select class="form-select shadow-none p-0 border-0 form-control-line @error('status') is-invalid @enderror" name="status">
            <option value="">{{ __('-- Select Status--') }}</option>
            @foreach($dogStatusList as $k => $v)
                <?php
                if( old('status', $dog->status) == $k ? 'selected' : '' ){
                    $selected = "selected";
                }else{
                    $selected = '';
                }
                ?>
                <option value="{{$k}}" {{ $selected }}>{{ $v }}</option>
            @endforeach
        </select>
        @error('status')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group mb-4">
        <label class="col-sm-12">Category</label>
        <div class="col-sm-12 border-bottom">
            <select class="form-select shadow-none p-0 border-0 form-control-line @error('category') is-invalid @enderror" name="category">
                <option value="">{{ __('-- Select Cateogry --') }}</option>
                @foreach($categories as $k => $v)
                        <?php
                        if( old('category', $dog->category_id) == $k ? 'selected' : '' ){
                            $selected = "selected";
                        }else{
                            $selected = '';
                        }
                        ?>
                    <option value="{{$k}}" {{ $selected }}>{{ $v }}</option>
                @endforeach
            </select>
            @error('category')
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
               value="{{ $dog->image }}">
        <input name="image" type="file" placeholder="image"
                  class="form-control p-0 border-0 @error('image') is-invalid @enderror" onchange="loadPreview(this);"/>
        <div class="image-preview-container {{empty($dog->image) ? '' : 'show'}}">
            <img id="preview_img"
                 src="{{ empty($dog->image) ? '' : asset('storage/uploads/dogs/' . $dog->image) }}"
                 class="img-fluid object-cover h-full w-full object-center" />
        </div>
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group mb-4 d-flex gap-2">
    <button class="btn btn-success">{{$buttonText}}</button>
    <a href="{{route('dogs.index')}}" class="btn btn-info">Cancel</a>
</div>
