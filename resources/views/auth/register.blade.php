@include('_partials.dashboard._head')
<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image" style="background-image: url({{asset('assets/images/login.jpg')}});"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Welcome to Hamro Shelter!</h3>
                            <!-- Sign In Form -->
                            <form action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Full Name</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password_confirmation" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword"> Confirm Password </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" id="rememberPasswordCheck">
                                    <label class="form-check-label" for="rememberPasswordCheck">
                                        Remember password
                                    </label>
                                    @error('remember')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                                    <div class="text-center">
                                        Already a user?  <a class="font-14" href="{{route('login')}}">Login Here</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('_partials.dashboard._foot')

