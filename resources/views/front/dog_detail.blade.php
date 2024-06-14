@extends('layouts.front')
@section('content')
    <!--== Start: Page Header Area Wrapper ==-->
    <div class="section page-header-area" data-bg-img="{{asset('assets/front/images/photos/bg3.jpg')}}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto text-center text-sm-start">
                    <h1 class="page-header-title">Dog Details</h1>
                </div>
                <div class="col-sm-auto">
                    <ol class="breadcrumb mb-0 justify-content-center mt-3 mt-sm-0">
                        <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--== End: Page Header Area Wrapper ==-->

    <!--== Start: Event Section Wrapper ==-->
    <div class="event-section section section-padding">
        <div class="container">
            <div class="events-details-image">
                <img src="{{asset('storage/uploads/dogs/'.$dog->image)}}" alt="Images">
            </div>
            <div class="events-details-content">
                <h3 class="title">{{$dog->name}}</h3>
                <p>{{$dog->description}}</p>
            </div>

            <div class="events-details-info-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="events-details-info-item">
                            <h3 class="title">Event Details:</h3>
                            <table class="events-details-info-table">
                                <tbody>
                                <tr>
                                    <td class="table-name">Date</td>
                                    <td class="table-dotted">:</td>
                                    <td class="table-velu">30 February, 2021</td>
                                </tr>
                                <tr>
                                    <td class="table-name">Time</td>
                                    <td class="table-dotted">:</td>
                                    <td class="table-velu">10:00 AM - 01:00 PM</td>
                                </tr>
                                <tr>
                                    <td class="table-name">Category</td>
                                    <td class="table-dotted">:</td>
                                    <td class="table-velu">charity / animal</td>
                                </tr>
                                <tr>
                                    <td class="table-name">Website</td>
                                    <td class="table-dotted">:</td>
                                    <td class="table-velu">www.charityevent.com</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="events-details-info-item">
                            <h3 class="title">Event Venue:</h3>
                            <table class="events-details-info-table">
                                <tbody>
                                <tr>
                                    <td class="table-name">Phone</td>
                                    <td class="table-dotted">:</td>
                                    <td class="table-velu">+00 568 432 458 75</td>
                                </tr>
                                <tr>
                                    <td class="table-name">Email:</td>
                                    <td class="table-dotted">:</td>
                                    <td class="table-velu">support@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="table-name">Head Quater</td>
                                    <td class="table-dotted">:</td>
                                    <td class="table-velu">(803) 794-1108 5200 Exum <br>West Columbia, South Carolina</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="events-map-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>
            </div>
            <div class="text-center">
                @auth
                @if($dog->status === \App\Constants\DogStatus::AVAILABLE)
                <button class="btn btn-primary btn-icon-right mt-6 mt-lg-10"  onclick="adoptDog('{{$dog->id}}','{{$dog->name}}')">
                    <span>Adopt Now</span> <i class="icofont-double-right icon"></i>
                </button>
                @endif
                @endauth
            </div>
        </div>
    </div>
    <!--== End: Event Section Wrapper ==-->

    <!--== Start: Divider Section Wrapper ==-->
    @include('._partials.front._contact')
    <!--== End: Divider Section Wrapper ==-->
@endsection
