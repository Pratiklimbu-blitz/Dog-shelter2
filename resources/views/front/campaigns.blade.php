@extends('layouts.front')
@section('content')
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area" data-bg-img="{{asset('assets/front/images/photos/bg3.jpg')}}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 class="page-header-title">Campaign</h1>
                </div>
                <div class="col-sm-auto">
                    <ol class="breadcrumb mb-0 justify-content-center mt-3 mt-sm-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Campaigns</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--== End: Page Header Area Wrapper ==-->

    <!--== Start: Campaign Section Wrapper ==-->
    <div class="campaign-section section section-padding">
        <div class="container" style="margin-bottom: 20px;">
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="row mb-n6">
                        <!--== Start Campaign Item ==-->
                        @foreach($campaigns as $campaign)
                            <div class="col-lg-3 col-xl-4 mb-6">
                                <div class="campaign-item campaign2-item-style" style="height: 100% ; padding-bottom: 10px">
                                    <a href="{{route('campaigns.detail',$campaign->id)}}"  class="image">
                                        <img src="{{asset('storage/uploads/campaigns/'.$campaign->poster)}}"  width="350" height="250" alt="Save for animal’s">
                                    </a>
                                    <div class="content " >
                                        <h4 class="title"> <a style="color:#cb914f; " href="{{route('campaigns.detail',$campaign->id)}}" >{{$campaign->title}}</a></h4>
                                        <div class="campaign-progress">
                                            <div class="progress-info">
                                                <p>Goal: <span>{{$campaign->title}}</span></p>

                                            </div>
                                            <div class="progress-info">
                                            <p>Collected Amount: <span>{{$campaign->collected_amount}}</span></p>
                                            </div>
                                        </div>
{{--                                        <p style="color:#cb914f;"> {{ Str::limit($campaign->description, 80) }}</p>--}}
                                        <p >Start Date: <span style="color:#cb914f; ">{{date('F j, Y', strtotime($campaign['start_date']))}} </span></p>
                                        <p >End Date: <span style="color:#cb914f; ">{{date('F j, Y', strtotime($campaign['end_date']))}}</span></p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--== End Campaign Item ==-->
                    </div>
                </div>

        </div>
    </div>
    <!--== End: Campaign Section Wrapper ==-->

    <!--== Start: Divider Section Wrapper ==-->
        @include('._partials.front._contact')
    <!--== End: Divider Section Wrapper ==-->
@endsection
