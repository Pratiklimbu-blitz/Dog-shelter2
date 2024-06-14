@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@extends('layouts.dashboard')
@section('content')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                <h4>User Details</h4>
                <div>
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-success">Edit</a>
                    <button onclick="history.back()" class="btn btn-info">Back</button>
                    <button type="button" onclick="confirmDelete(() => {deleteDog({{$user->id}},true)})" class="btn btn-danger">
                        Delete
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-nowrap" id="userDatatable">
                    <tbody>
                    <tr>
                        <th>
                             Name
                        </th>
                        <td>
                            {{$user->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{$user->email}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Role
                        </th>
                        <td>
                            {{$user->role->label}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created At:
                        </th>
                        <td>
                            {{\App\Helpers\AppHelper::datetime_on_user_timezone($user->created_at)}}
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
