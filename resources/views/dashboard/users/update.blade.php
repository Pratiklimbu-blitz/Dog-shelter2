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
            <div class="card-body">
                <form id="create_user_form" class="form-horizontal form-material" action="{{route('users.update',$user)}}" method="POST">
                    {{ method_field('PUT') }}
                    @include('dashboard.users._form',['show' => false,'buttonText' => 'Update'])
                </form>
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
