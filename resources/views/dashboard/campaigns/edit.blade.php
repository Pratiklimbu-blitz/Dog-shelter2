@extends('layouts.dashboard')
@section('title','Edit Campaigns')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header">
                        <h1 class="card-title table-title">
                            Edit Campaigns
                        </h1>
                    </div>
                    <div class="card-body">

                        <form action="{{route('campaigns.update',$campaign)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @include('dashboard.campaigns._form',['buttonText' => 'Update'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
