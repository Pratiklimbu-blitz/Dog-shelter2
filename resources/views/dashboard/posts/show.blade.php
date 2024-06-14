@extends('layouts.dashboard')
@section('title','Posts')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                            <h4>Posts Details</h4>
                            <div>
                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('posts.index')}}" class="btn btn-info">Back</a>
                                <button type="button" onclick="confirmDelete(() => {deletePost({{$post->id}},true)})" class="btn btn-danger">
                                    Delete
                                </button>
                            </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered ms-show-table">`
                            <tr>
                                <th>Title</th>
                                <td>{{ $post->title }}</td>
                            </tr>

                            <tr>
                                <th>Body</th>
                                <td>{{ $post->description}}</td>
                            </tr>

                            <tr>
                                <th>Feature Image</th>
                                <td>{{ $post->image }}</td>
                            </tr>
                            <tr>
                                <th>Created_at</th>
                                <td>{{ $post->created_at}}</td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
