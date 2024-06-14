@extends('layouts.dashboard')
@section('content')
<div class="row">
        <div class="card">
            <div class="card-body">
                <form id="create_user_form" class="form-horizontal form-material" action="{{route('dogs.store')}}" enctype="multipart/form-data" method="POST">
                    @include('dashboard.dogs._form',['show' => true,'buttonText' => 'Create'])
                </form>
            </div>
        </div>
</div>
@endsection
