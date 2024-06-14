@extends('layouts.front')
@section('content')
    @include('utils._error_all')
    <!--== Start: Wrapper ==-->
    <div class="wrapper">


        <main class="main-content">
            <!--== Start: Page Header Area Wrapper ==-->
            <div class="section page-header-area" data-bg-img="{{asset('assets/front/images/photos/bg3.jpg')}}">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-auto text-center text-sm-start">
                            <h1 class="page-header-title">Blog Details</h1>
                        </div>
                        <div class="col-sm-auto">
                            <ol class="breadcrumb mb-0 justify-content-center mt-3 mt-sm-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End: Page Header Area Wrapper ==-->

            <!--== Start: Blog Details Section Wrapper ==-->
            <div class="blog-details-section section section-padding-t">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="post-details-info text-center mt-n2">
                                <div class="meta">
                                    <span class="author">By <a href="blog.html">Harold Leonard</a></span>
                                    <span class="dots"></span>
                                    <span class="post-date">{{$post->created_at ->format("d M Y")}} </span>
                                    <span class="dots"></span>
                                    <span class="post-time"> 10 min read</span>
                                </div>
                                <h4 class="title">{{$post->title}}</h4>
{{--                                <div class="widget-tags">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="blog.html">Charity</a></li>--}}
{{--                                        <li><a class="active" href="blog.html">Human</a></li>--}}
{{--                                        <li><a href="blog.html">Animal’s</a></li>--}}
{{--                                        <li><a href="blog.html">Forest</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>
                            <div class="post-details-thumb">
                                <img class="w-100" src="{{asset('storage/uploads/posts/'.$post->image)}}" alt="Image"
                                     width="770" height="550">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="post-details-content">
                                <h4 class="title">{{$post->title}}</h4>
                                <p>{{$post->description}}</p>
                                {{--                                <div class="post-details-content-list">--}}
                                {{--                                    <h4 class="title">Table of Content:</h4>--}}
                                {{--                                    <ul class="list-style">--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="blog-details.html"><i class="icofont-double-right"></i> It was popularised in the 1960s with the release of Letraset sheets containing</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="blog-details.html"><i class="icofont-double-right"></i> Many desktop publishing packages and web page editors now use</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="blog-details.html"><i class="icofont-double-right"></i> It was popularised in the 1960s with the release of Letraset sheets containing</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="blog-details.html"><i class="icofont-double-right"></i> Many desktop publishing packages and web page editors now use</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="blog-details.html"><i class="icofont-double-right"></i> It was popularised in the 1960s with the release of Letraset sheets containing</a>--}}
                                {{--                                        </li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                                <div class="post-details-footer">
                                    <div class="post-details-social-icons">
                                        <span>Share this article:</span>
                                        <div class="social-icons">
                                            <a href="https://www.facebook.com" target="_blank" rel="noopener"><i
                                                    class="icofont-facebook"></i></a>
                                            <a href="https://www.skype.com" target="_blank" rel="noopener"><i
                                                    class="icofont-skype"></i></a>
                                            <a href="https://twitter.com" target="_blank" rel="noopener"><i
                                                    class="icofont-twitter"></i></a>
                                            <a href="https://www.linkedin.com/signup" target="_blank" rel="noopener"><i
                                                    class="icofont-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--            <div class="blog-related-section section bg-light">--}}
            {{--                <div class="container">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-12">--}}
            {{--                            <div class="related-post-title-wrap">--}}
            {{--                                <h4 class="title">You may also like</h4>--}}
            {{--                                <!--== Add Swiper Arrows ==-->--}}
            {{--                                <div class="related-post-swiper-btn-wrap">--}}
            {{--                                    <div class="related-post-swiper-btn-prev">--}}
            {{--                                        <i class="icofont-long-arrow-left"></i>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="related-post-swiper-btn-next">--}}
            {{--                                        <i class="icofont-long-arrow-right"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-12">--}}
            {{--                            <div class="swiper related-post-slider-container">--}}
            {{--                                <div class="swiper-wrapper">--}}
            {{--                                    <div class="swiper-slide">--}}
            {{--                                        <div class="post-item post4-item-style">--}}
            {{--                                            <a href="blog-details.html" class="image">--}}
            {{--                                                <img src="{{asset('assets/front/images/blog/image-11.jpg')}}" width="350" height="270" alt="News Post Image">--}}
            {{--                                            </a>--}}
            {{--                                            <div class="content">--}}
            {{--                                                <div class="post-author"><span>By</span> <a href="blog.html">Michael Becker</a></div>--}}
            {{--                                                <h4 class="title"><a href="blog-details.html">Why wild animal welfare in <br>addition to farmed animal...</a></h4>--}}
            {{--                                                <ul class="post-meta post4-meta">--}}
            {{--                                                    <li class="post-date">03 April, 2021</li>--}}
            {{--                                                    <li class="post-dot"><span></span></li>--}}
            {{--                                                    <li class="post-time">10 min read</li>--}}
            {{--                                                </ul>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="swiper-slide">--}}
            {{--                                        <div class="post-item post4-item-style">--}}
            {{--                                            <a href="blog-details.html" class="image">--}}
            {{--                                                <img src="{{asset('assets/front/images/blog/image-12.jpg')}}" width="350" height="270" alt="News Post Image">--}}
            {{--                                            </a>--}}
            {{--                                            <div class="content">--}}
            {{--                                                <div class="post-author"><span>By</span> <a href="blog.html">Michael Becker</a></div>--}}
            {{--                                                <h4 class="title"><a href="blog-details.html">Organizations and individual <br>advocates around the world...</a></h4>--}}
            {{--                                                <ul class="post-meta post4-meta">--}}
            {{--                                                    <li class="post-date">03 April, 2021</li>--}}
            {{--                                                    <li class="post-dot"><span></span></li>--}}
            {{--                                                    <li class="post-time">10 min read</li>--}}
            {{--                                                </ul>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="swiper-slide">--}}
            {{--                                        <div class="post-item post4-item-style">--}}
            {{--                                            <a href="blog-details.html" class="image">--}}
            {{--                                                <img src="{{asset('assets/front/images/blog/image-13.jpg')}}" width="350" height="270" alt="News Post Image">--}}
            {{--                                            </a>--}}
            {{--                                            <div class="content">--}}
            {{--                                                <div class="post-author"><span>By</span> <a href="blog.html">Michael Becker</a></div>--}}
            {{--                                                <h4 class="title"><a href="blog-details.html">It is not currently possible for us to <br>have a good sense.</a></h4>--}}
            {{--                                                <ul class="post-meta post4-meta">--}}
            {{--                                                    <li class="post-date">03 April, 2021</li>--}}
            {{--                                                    <li class="post-dot"><span></span></li>--}}
            {{--                                                    <li class="post-time">10 min read</li>--}}
            {{--                                                </ul>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="blog-comment-section section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="comment-view-wrap">
                                <h2 class="main-title">Comments({{$comment->count()}})</h2>
                                <div class="comment-content">

                                    @foreach($comment as $reply)

                                        <div class="single-comment comment-reply mb--0">
                                            <div class="author-info">

                                                <div class="author-details">
                                                    <h4 class="title">{{$reply->name}}</h4>
                                                    <ul>
                                                        <li>{{$reply->email}} <span>{{$reply->created_at->diffForHumans()}}</span></li>
                                                    </ul>
                                                    <p class="desc">{{$reply->comment}}</p>
                                                </div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="comment-form-wrap pt-8">
                                <h2 class="main-title">Leave a Comment</h2>
                                <form action="{{route('front.comments.store')}}" class="comment-form"
                                      method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <input class="form-control"  id="name" name="name"
                                                       type="text" placeholder="Name">
                                                <input style="display: none" class=" hidden" value="{{$post->id}}" id="name" name="post_id"
                                                       type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <input class="form-control"  id="email" name="email"
                                                       type="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-8">
                                                <textarea class="form-control" name="comment" id="comment"
                                                          placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group text-center">
                                                <button class="btn btn-primary btn-icon-right" type="submit"><span>Submit Now</span>
                                                    <i class="icofont-double-right icon"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End: Blog Details Section Wrapper ==-->

            <!--== Start: Divider Section Wrapper ==-->
            @include('._partials.front._contact')
            <!--== End: Divider Section Wrapper ==-->
        </main>
@endsection
