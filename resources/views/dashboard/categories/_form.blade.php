@csrf
<div class="form-group mb-4">
    <label class="col-md-12 p-0">Type</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="type" type="text" placeholder="Enter Category Type"
               class="form-control p-0 border-0 text-start @error('type') is-invalid @enderror"
               value="{{ old('type', $category->type) }}">
        @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group mb-4 d-flex gap-2">
    <button class="btn btn-success">{{$buttonText}}</button>
    <a href="{{route('categories.index')}}" class="btn btn-info">Cancel</a>
</div>
