
@extends('layouts.dashboard')
@section('content')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                <h4>Volunteer Details</h4>
                <div>
                    <button onclick="history.back()" class="btn btn-info">Back</button>
                    <button type="button" onclick="confirmDelete(() => {deleteDog({{$volunteer->id}},true)})" class="btn btn-danger">
                        Delete
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-nowrap" id="volunteerDatatable">
                    <tbody>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{$volunteer->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{$volunteer->email}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Phone Number
                        </th>
                        <td>
                            {{$volunteer->phone_number}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{$volunteer->description}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td class="form-group  d-flex">
                            <div>
                            @php
                            if($volunteer->status == \App\Constants\VolunteerStatus::REQUESTED){
                          echo \App\Helpers\AppHelper::info_pill($volunteer->status);
                            }
                            if($volunteer->status == \App\Constants\VolunteerStatus::REJECTED){
                           echo \App\Helpers\AppHelper::danger_pill($volunteer->status);
                            }
                            if($volunteer->status == \App\Constants\VolunteerStatus::APPROVED){
                           echo \App\Helpers\AppHelper::success_pill($volunteer->status);
                            }
                            @endphp
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created At:
                        </th>
                        <td>
                            {{\App\Helpers\AppHelper::datetime_on_user_timezone($volunteer->created_at)}}
                        </td>
                    </tr>
                    </tbody>
                </table>
                @if($volunteer->status == \App\Constants\VolunteerStatus::REQUESTED)
                <div class="d-flex justify-content-evenly">
                    <a href="{{route('verifyVolunteer',$volunteer->id)}}" class="btn btn-primary text-dark">Approve Volunteer</a>
                    <a href="{{route('rejectVolunteer',$volunteer->id)}}" class="btn btn-danger text-dark">Reject Volunteer</a>
                </div>
                @endif
            </div>
        </div>

        {{--    </div>--}}
        <!-- Column -->
    </div>

    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection
