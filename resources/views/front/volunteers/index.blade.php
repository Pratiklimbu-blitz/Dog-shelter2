@extends('layouts.front')
@section('content')
    <div class="container">
    <div class="">
        <p>
            Voluntary Work with Hamro Shelter - Find a Volunteer Role with hamro shelter. Hamro shelter is an Animal Charity,
            working to protect street dogs, left out & dogs in need of care. we promote and work for dog welfare.
        </p>
        <p  class="mb-4">
            Fill out the form below and be a part of us:
        </p>
    </div>
    <form action="{{route('front.volunteer.store')}}" class="mb-8" method="POST">
        @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputName" value="{{ old('name') }}" placeholder="name"
                           name="name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail"
                           placeholder="example@test.com">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputDescription">Description</label>
                    <input value="{{ old('description') }}" type="text" class="form-control" id="inputDescription"
                           name="description">
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPhoneNumber">Phone Number</label>
                    <input type="tel" value="{{ old('phone_number') }}" class="form-control"
                           id="inputPhoneNumber" placeholder="Phone Number" name="phone_number">
                    @error('phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>

    </form>
    </div>
@endsection
