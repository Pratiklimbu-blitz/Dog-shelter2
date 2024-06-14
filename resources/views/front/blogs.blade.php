@extends('layouts.front')
@section('content')
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area" data-bg-img="{{asset('assets/front/images/photos/bg3.jpg')}}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 class="page-header-title">Blogs</h1>
                </div>
                <div class="col-sm-auto">
                    <ol class="breadcrumb mb-0 justify-content-center mt-3 mt-sm-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--== End: Page Header Area Wrapper ==-->

    <!--== Start: Campaign Section Wrapper ==-->
    <div class="campaign-section section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-8">
                    <div class="row mb-n6">
                        <!--== Start Campaign Item ==-->
                        @foreach($posts as $post)
                            <div class="col-lg-4 col-xl-6 mb-6">
                                <div class="campaign-item campaign2-item-style" style="height: 100%">
                                    <a href="{{route('blogs.detail',$post->id)}}"  class="image">
                                        <img src="{{asset('storage/uploads/posts/'.$post->image)}}"  width="350" height="250" alt="Save for animal’s">
                                    </a>
                                    <div class="content">
                                        <h4 class="title"> <a href="{{route('blogs.detail',$post->id)}}" >{{$post->name}}</a></h4>
                                        <div class="campaign-progress">
                                            <div class="progress-info">
                                                <p>Goal: <span>{{$post->title}}</span></p>

                                            </div>
                                            <strong  >Published Date: <span  style="color: #cb914f; ">{{date('F j, Y', strtotime($post['created_at']))}}</span></strong>
                                        </div>
                                        <p> {{ Str::limit($post->description, 80) }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--== End Campaign Item ==-->
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4">
                    <!-- Start: Sidebar Wrapper -->
                    <div class="sidebar-wrap mt-8 mt-xl-0 ps-0 ps-xl-6">
                        <div class="sidebar-search-widget">
                            <form action="#">
                                <input class="form-control" type="search" placeholder="Search here">
                                <button type="button"><i class="icofont-search-1"></i></button>
                            </form>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Posts Category</h3>

                            <div class="sidebar-widget-body">
                                <ul class="sidebar-category-list">
                                    @foreach($posts as $post)
                                    <li><a href="causes.html">{{$post->title}} <span>{{$post->created_at}}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Recent Posts</h3>
                            <div class="sidebar-widget-body">
                                <div class="sidebar-causes-list">
                                    <a href="causes.html" class="image">
                                        <img src="{{asset('assets/front/images/campaign/s1.jpg')}}" width="70" height="70" alt="Images">
                                    </a>
                                    <div class="content">
                                        <h4 class="title"><a href="causes.html">Donated $12 million to other animal welfare</a></h4>
                                        <h4 class="causes-goal">Goal: $8,957</h4>
                                    </div>
                                </div>
                                <div class="sidebar-causes-list">
                                    <a href="causes.html" class="image">
                                        <img src="{{asset('assets/front/images/campaign/s2.jpg')}}" width="70" height="70" alt="Images">
                                    </a>
                                    <div class="content">
                                        <h4 class="title"><a href="causes.html">How much the charity's go to the animals?</a></h4>
                                        <h4 class="causes-goal">Goal: $8,957</h4>
                                    </div>
                                </div>
                                <div class="sidebar-causes-list">
                                    <a href="causes.html" class="image">
                                        <img src="{{asset('assets/front/images/campaign/s3.jpg')}}" width="70" height="70" alt="Images">
                                    </a>
                                    <div class="content">
                                        <h4 class="title"><a href="causes.html">Which charity will have the greatest impact?</a></h4>
                                        <h4 class="causes-goal">Goal: $8,957</h4>
                                    </div>
                                </div>
                                <div class="sidebar-causes-list">
                                    <a href="causes.html" class="image">
                                        <img src="{{asset('assets/front/images/campaign/s4.jpg')}}" width="70" height="70" alt="Images">
                                    </a>
                                    <div class="content">
                                        <h4 class="title"><a href="causes.html">Animals in need through their veterinary</a></h4>
                                        <h4 class="causes-goal">Goal: $8,957</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                            <div class="sidebar-widget mb-0">--}}
                        {{--                                <h3 class="sidebar-widget-title">Share Now</h3>--}}
                        {{--                                <div class="widget-social-icons">--}}
                        {{--                                    <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>--}}
                        {{--                                    <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>--}}
                        {{--                                    <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>--}}
                        {{--                                    <a href="https://www.linkedin.com" target="_blank" rel="noopener"><i class="icofont-linkedin"></i></a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                    </div>
                    <!-- End: Sidebar Wrapper -->
                </div>
            </div>
        </div>
    </div>
    <!--== End: Campaign Section Wrapper ==-->

    <!--== Start: Divider Section Wrapper ==-->
    @include('._partials.front._contact')
    <!--== End: Divider Section Wrapper ==-->
@endsection
