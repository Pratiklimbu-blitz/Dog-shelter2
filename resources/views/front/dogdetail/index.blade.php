@extends('layouts.front')
@section('content')
    <form action="{{route('front.dogdetail.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="description">
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sender_name">Status</label>
                            <?php
                            $dogStatusList = \App\Constants\DogStatus::LIST;
                            ?>
                        <select class="form-select shadow-none p-0 border-0 form-control-line @error('status') is-invalid @enderror" name="status">
                            <option value="">{{ __('-- Select Status--') }}</option>
                            @foreach($dogStatusList as $k => $v)
                                    <?php

                                        $selected = '';

                                    ?>
                                <option value="{{$k}}" {{ $selected }}>{{ $v }}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category">Category</label>
                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0 form-control-line @error('category') is-invalid @enderror" name="category">
                                <option value="">{{ __('-- Select Cateogry --') }}</option>
                                @foreach($categories as $k => $v)
                                        <?php

                                            $selected = '';

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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                        <div class="col-md-12 border-bottom p-0">

                            <input type="file" name="image" id="image-input">
                            <div class="image-preview-container {{empty($dog->image) ? '' : 'show'}}">
                                <style>
                                    #preview_img{
                                        margin-top: 5px;
                                        max-width: 150px;
                                        object-fit: cover;
                                        object-position: center;
                                    }
                                </style>
                                <img id="preview_img"
                                     src="{{ empty($dog->image) ? '' : asset('storage/uploads/dogs/' . $dog->image) }}"
                                     class="img-fluid object-cover h-full w-full object-center"  />
                            </div>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                            @enderror
                        </div>
                    </div>
                                <button type="submit" class="btn btn-primary">submit</button>
    </form>

@endsection

@push('scripts')
    <script>
        $(document).ready(function (){
            $('#image-input').on('change',function (){
                const input = this;
                const id = '#preview_img'
                    if (input.files && input.files[0]) {
                        $(id).closest(".image-preview-container").addClass("show");
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            $(id).attr("src", e.target.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
            });
        })
        // function loadPreview(input, id) {
        //     id = id || "#preview_img";
        //     if (input.files && input.files[0]) {
        //         $(id).closest(".image-preview-container").addClass("show");
        //         const reader = new FileReader();
        //         reader.onload = function (e) {
        //             $(id).attr("src", e.target.result);
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

    </script>

@endpush
