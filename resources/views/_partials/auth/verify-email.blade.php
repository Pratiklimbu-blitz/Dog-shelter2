@extends('layouts.auth')
@section('body')

    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                    <div class="brand-logo">
                        <img src="{{asset('assets/images/logo.svg')}}">
                    </div>
                    <h4>Hello! Please verify your email</h4>

                    <form class="pt-3" action="{{route('login')}}" method="POST">
                        @csrf


                        <div class="mt-3">
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">Resend</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
