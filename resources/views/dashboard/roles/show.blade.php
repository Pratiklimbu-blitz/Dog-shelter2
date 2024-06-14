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
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                    <h4>Roles Details</h4>
                    <div>
                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-success">Edit</a>
                        <button onclick="history.back()" class="btn btn-info">Back</button>
                        <button type="button" onclick="confirmDelete(() => {deleteDog({{$role->id}},true)})"
                                class="btn btn-danger">
                            Delete
                        </button>
                    </div>
                </div>
            <div class="card-body">
                <table class="table text-nowrap" id="roleDatatable">
                    <tbody>
                    <tr>
                        <th>
                             Name
                        </th>
                        <td>
                            {{$role->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Label
                        </th>
                        <td>
                            {{$role->label}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{$role->description}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created At
                        </th>
                        <td>
                            {{\App\Helpers\AppHelper::datetime_on_user_timezone($role->created_at)}}
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
