@csrf
    <div class="form-group mb-4">
        <label class="col-md-12 p-0">Full Name</label>
        <div class="col-md-12 border-bottom p-0">
            <input name="name" type="text" placeholder="Johnathan Doe"
                   class="form-control p-0 border-0 @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0">Email</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="email" type="text" placeholder="Email"
               class="form-control p-0 border-0 @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
    <div class="form-group mb-4">
        <label class="col-sm-12">Role</label>
        <div class="col-sm-12 border-bottom">
            <select class="form-select shadow-none p-0 border-0 form-control-line @error('role_id') is-invalid @enderror" name="role_id">
                <option value="">{{ __('-- Select --') }}</option>
                @foreach($roles as $rk => $rv)
                        <?php
                        if( old('role_id', $user->role_id) == $rk ? 'selected' : '' ){
                            $selected = "selected";
                        }else{
                            $selected = '';
                        }
                        ?>
                    <option value="{{$rk}}" {{ $selected }}>{{ $rv }}</option>
                @endforeach
            </select>
            @error('role_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
@if($show)
    <div class="form-group mb-4">
        <label for="password" class="col-md-12 p-0">Password</label>
        <div class="col-md-12 border-bottom p-0">
            <input name="password" type="password" class="form-control p-0 border-0 @error('password') is-invalid @enderror" value="{{ old('password', $user->password) }}">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="password_confirmation" class="col-md-12 p-0">Confirm Password</label>
        <div class="col-md-12 border-bottom p-0">
            <input name="password_confirmation" type="password" class="form-control p-0 border-0 @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation', $user->password_confirmation) }}">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>

@endif
    <div class="form-group mb-4 d-flex">
        <div class="col-sm-2">
        <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-success">{{$buttonText}}</button>
        </div>
    </div>

