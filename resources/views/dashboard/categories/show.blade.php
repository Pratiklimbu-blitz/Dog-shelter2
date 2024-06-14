@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                <h4>Category Details</h4>
                <div>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('categories.index')}}" class="btn btn-info">Back</a>
                    <button type="button" onclick="confirmDelete(() => {deleteCategory({{$category->id}},true)})" class="btn btn-danger">
                        Delete
                    </button>
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table text-nowrap">
                    <tbody>
                    <tr>
                        <th>
                             Type
                        </th>
                        <td>
                            {{ucwords($category->type)}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created At
                        </th>
                        <td>
                            {{\App\Helpers\AppHelper::datetime_on_user_timezone($category->created_at)}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
