@extends('layouts.dashboard')
@section('title','Create campaigns')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header d-flex justify-content-between">
                        <h1 class="card-title table-title">
                            Create Campaign
                        </h1>
                        <!-- <div>
                            <a href="{{route('campaigns.index')}}" class="btn btn-sm btn-secondary">Back</a>
                        </div> -->
                    </div>
                    <div class="card-body">

                        <form id="create_user_form"  class="form-horizontal form-material" action="{{route('campaigns.store')}}" enctype="multipart/form-data" method="POST">
                            @include('dashboard.campaigns._form',['buttonText' => 'Create'])
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
