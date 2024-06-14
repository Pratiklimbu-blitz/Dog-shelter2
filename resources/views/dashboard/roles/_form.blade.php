@csrf
    <div class="form-group mb-4">
        <label class="col-md-12 p-0">Role Name</label>
        <div class="col-md-12 border-bottom p-0">
            <input name="name" type="text" placeholder="Johnathan Doe"
                   class="form-control p-0 border-0 @error('name') is-invalid @enderror" value="{{ old('name', $role->name) }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0">Label</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="label" type="text" placeholder="Label"
               class="form-control p-0 border-0 @error('label') is-invalid @enderror" value="{{ old('label', $role->label) }}">
        @error('label')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
   
 
<div class="form-group mb-4">
    <label class="col-md-12 p-0">Description</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="description" type="text" placeholder="Desciption"
               class="form-control p-0 border-0 @error('description') is-invalid @enderror" value="{{ old('desription', $role->description) }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
   

<div class="form-group mb-4 d-flex">
        <div class="col-sm-2">
        <a href="{{route('roles.index')}}" class="btn btn-danger">Cancel</a>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-success">{{$buttonText}}</button>
        </div>
    </div>



