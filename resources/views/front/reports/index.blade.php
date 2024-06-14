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
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" placeholder="subject" name="subject"
                           value="{{old('subject')}}">
                    @error('subject')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="message">Message</label>
                    <input type="text" class="form-control" name="message" id="message" placeholder="message" value="{{old('message')}}"/>
                    @error('message')
                    <span class=" text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="sender_name">Sender Name</label>
                    <input type="text" class="form-control" id="sender_name" placeholder="sender name"
                           value="{{old('sender_name')}}"
                           name="sender_name">
                    @error('sender_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="sender_email">Sender Email </label>
                    <input type="email" class="form-control" id="sender_email" placeholder="sender email"
                           value="{{old('sender_email')}}"
                           name="sender_email">
                    @error('sender_email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="sender_phone">Sender Phone </label>
                    <input type="tel" class="form-control" id="sender_phone" placeholder="sender phone"
                           value="{{old('sender_phone')}}"
                           name="sender_phone">
                    @error('sender_phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="location">Location </label>
                    <input type="text" class="form-control" id="location" placeholder="location"
                           value="{{old('location')}}"
                           name="location">
                    @error('location')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </div>
    </form>

@endsection
