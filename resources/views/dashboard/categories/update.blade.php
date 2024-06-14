@extends('layouts.dashboard')
@section('content')
    <div class="row">
            <div class="card">
                <div class="card-body">
                    <form id="create_category_form" class="form-horizontal form-material"
                          action="{{route('categories.update',$category)}}" method="POST">
                        {{ method_field('PUT') }}
                        @include('dashboard.categories._form',['show' => false,'buttonText' => 'Update'])
                    </form>
                </div>
            </div>
    </div>
@endsection
