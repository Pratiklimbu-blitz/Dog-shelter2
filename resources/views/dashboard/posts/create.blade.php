@extends('layouts.dashboard')
@section('title','Create posts')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header d-flex justify-content-between">
                        <h1 class="card-title table-title">
                            Create Post
                        </h1>
                        <!-- <div>
                            <a href="{{route('posts.index')}}" class="btn btn-sm btn-secondary">Back</a>
                        </div> -->
                    </div>
                    <div class="card-body">

                        <form id="create_user_form"  class="form-horizontal form-material" action="{{route('posts.store')}}" enctype="multipart/form-data" method="POST">
                            @include('dashboard.posts._form',['buttonText' => 'Create'])
                       </form>

                       

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection