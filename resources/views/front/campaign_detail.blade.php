@extends('layouts.front')
@section('content')
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <!--== Start: Wrapper ==-->
    <div class="wrapper">

        <main class="main-content">
            <!--== Start: Page Header Area Wrapper ==-->
            <div class="section page-header-area" data-bg-img="{{asset('assets/front/images/photos/bg3.jpg')}}">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-auto text-center text-sm-start">
                            <h1 class="page-header-title">Campaign Detail</h1>
                        </div>
                        <div class="col-sm-auto">
                            <ol class="breadcrumb mb-0 justify-content-center mt-3 mt-sm-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Campaign Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End: Page Header Area Wrapper ==-->

            <!--== Start: Campaign Details Section Wrapper ==-->
            <div class="blog-details-section section section-padding-t">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="post-details-info text-center mt-n2">
                                <h4 class="title">{{$campaign->title}}</h4>
                            </div>
                            <div class="post-details-thumb">
                                <img class="w-100" src="{{asset('storage/uploads/campaigns/'.$campaign->poster)}}"
                                     alt="Image" width="1170" height="550">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="post-details-content">
                                <h4 class="title">{{$campaign->title}}</h4>
                                <p class="tinymce">{{ $campaign->description }}</p>
                                <button class="btn btn-primary btn-icon-right" id="join-now"
                                   ><span>Join Now</span> <i
                                        class="icofont-double-right icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--== End: Campaign Details Section Wrapper ==-->

            <!--== Start: Divider Section Wrapper ==-->
            @include('._partials.front._contact')
            <!--== End: Divider Section Wrapper ==-->
        </main>
        @endsection
        @auth()
        @push('scripts')
            <script>
                $(document).ready(function () {
                    $('#join-now').click(function (e) {
                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: '{{route('participant.userStore',$campaign->id)}}',
                            data: {
                                user_id: {{ auth()->user()->id }},
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {

                                toastr.success(
                                    'Success!!',
                                    response.message,
                                );
                            },
                            error: function (response) {
                                console.log(response)
                                toastr.error(
                                    response.responseJSON.error,
                                    'Error !!'
                                );
                            }
                        });
                    });
                });
            </script>
    @endpush
    @endauth
