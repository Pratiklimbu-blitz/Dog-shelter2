@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form id="create_user_form" class="form-horizontal form-material" action="{{route('dogs.update',$dog)}}" enctype="multipart/form-data" method="POST">
                    {{ method_field('PUT') }}
                    @include('dashboard.dogs._form',['show' => false,'buttonText' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection
