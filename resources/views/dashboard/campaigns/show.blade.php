@extends('layouts.dashboard')
@section('title','Campaigns')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                        <h4>Campaign Details</h4>
                        <div>
                            <a href="{{route('campaigns.edit', $campaign->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('campaigns.index')}}" class="btn btn-info">Back</a>
                            <button type="button" onclick="confirmDelete(() => {deleteCampaign({{$campaign->id}},true)})" class="btn btn-danger">
                                Delete
                            </button>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered ms-show-table">`
                            <tr>
                                <th>Title</th>
                                <td>{{ $campaign->title }}</td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>{{ $campaign->description}}</td>
                            </tr>

                            <tr>
                                <th>Start Date</th>
                                <td>{{ $campaign->start_date}}</td>
                            </tr>
                            <tr>
                                <th>End Date</th>
                                <td>{{ $campaign->end_date}}</td>
                            </tr>
                            <tr>
                                <th>Poster</th>
                                <td>{{ $campaign->poster}}</td>
                            </tr>

                            <tr>
                                <th>Participants Name</th>
                                @foreach($campaign->users as $user)
                                    <td>{{ $user->name }}</td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>Created_at</th>
                                <td>{{ $campaign->created_at}}</td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
