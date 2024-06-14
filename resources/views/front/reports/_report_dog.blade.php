@extends('layouts.front')
@section('content')
    <style>
        .mb-3 {
            margin-bottom: 30px !important;
        }
    </style>
    <div class="container">
        <p class="mt-5">
            Lorem ipsum lorem ipsum lorem  Lorem ipsum lorem ipsum lorem Lorem ipsum lorem ipsum lorem Lorem ipsum lorem ipsum lorem Lorem ipsum lorem ipsum lorem Lorem ipsum lorem ipsum lorem Lorem ipsum lorem ipsum lorem Lorem ipsum lorem ipsum lorem
        </p>
        <p  class="mb-4">
            Fill out the form below and be a part of us:
        </p>
    </div>
    <form class="mb-3" action="{{route('front.reports.store')}}" method="POST">
        @csrf
        <div class="container">
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="name" name="name"
                           value="{{old('name')}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{old('description')}}"/>
                    @error('description')
                    <span class=" text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </div>
    </form>

@endsection
