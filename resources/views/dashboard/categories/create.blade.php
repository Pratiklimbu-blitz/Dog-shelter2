@extends('layouts.dashboard')
@section('content')
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
{{--    <div class="col-lg-8 col-xlg-9 col-md-12">--}}
        <div class="card">
            <div class="card-body">
                <form id="create_category_form" class="form-horizontal form-material" action="{{route('categories.store')}}" method="POST">
                    @include('dashboard.categories._form',['show' => true,'buttonText' => 'Create'])
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
