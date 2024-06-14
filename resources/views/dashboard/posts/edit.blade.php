@extends('layouts.dashboard')
@section('title','Edit Posts')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header">
                        <h1 class="card-title table-title">
                            Edit Posts
                        </h1>
                    </div>
                    <div class="card-body">

                        <form action="{{route('posts.update',$post)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @include('dashboard.posts._form',['buttonText' => 'Update'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
