@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@extends('layouts.dashboard')
@section('content')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        {{--    <div class="col-lg-8 col-xlg-9 col-md-12">--}}
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                <h4>Reports Details</h4>
                <div>
                    <a href="{{route('reports.edit', $report->id)}}" class="btn btn-success">Edit</a>
                    <button onclick="history.back()" class="btn btn-info">Back</button>
                    <button type="button" onclick="confirmDelete(() => {deleteDog({{$report->id}},true)})"
                            class="btn btn-danger">
                        Delete
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-nowrap" id="reportDatatable">
                    <tbody>
                    <tr>
                        <th>
                            Subject
                        </th>
                        <td>
                            {{$report->subject}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Message
                        </th>
                        <td>
                            {{$report->message}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sender_Name
                        </th>
                        <td>
                            {{$report->sender_name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sender_Email
                        </th>
                        <td>
                            {{$report->sender_email}}
                        </td>
                    </tr>      <tr>
                        <th>
                            Sender_Phone
                        </th>
                        <td>
                            {{$report->sender_phone}}
                        </td>
                    </tr>      <tr>
                        <th>
                            Location
                        </th>
                        <td>
                            {{$report->location}}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            Created At
                        </th>
                        <td>
                            {{\App\Helpers\AppHelper::datetime_on_user_timezone($report->created_at)}}
                        </td>
                    </tr>
                    </tbody>
                </table>
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
