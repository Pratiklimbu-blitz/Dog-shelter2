@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center pt-4">
                    <h4>Dogs Details</h4>
                    <div>
                        <a href="{{route('dogs.edit', $dog->id)}}" class="btn btn-success">Edit</a>
                        <button onclick="history.back()" class="btn btn-info">Back</button>
                        <button type="button" onclick="confirmDelete(() => {deleteDog({{$dog->id}},true)})"
                                class="btn btn-danger">
                            Delete
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    @if($dog->user)
                        <div class="white-box row ">
                            <div class="col-md-6 col-xs-12">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>
                                            Adopter Name
                                        </th>
                                        <td>
                                            {{$dog->user->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <td>
                                            {{$dog->user->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Requested At
                                        </th>
                                        <td>
                                            {{\App\Helpers\AppHelper::datetime_on_user_timezone($dog->updated_at)}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           Dog Status
                                        </th>
                                        <td>
                                            {{$dog->status}}
                                        </td>
                                    </tr>
                                    @if($dog->status === \App\Constants\DogStatus::REQUESTED)
                                        <tr>
                                            <th>
                                            </th>
                                            <td>
                                                <button id="accept-btn" class="btn btn-primary text-dark">Accept
                                                </button>
                                                <button id="reject-btn" class="btn btn-secondary text-dark">Reject
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            <div class="col-md-6 col-xs-12">
                                <span class="border-left"></span>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <td>
                                            {{$dog->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Description
                                        </th>
                                        <td>
                                            {!! $dog->description !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Category
                                        </th>
                                        <td>
                                            {{$dog->category?->type}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Image
                                        </th>
                                        <td>
                                            <img class='prev-image'
                                                 src="{{asset('/storage/uploads/dogs/'.$dog->image)}}"
                                                 alt="{{$dog->name}}"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Created At
                                        </th>
                                        <td>
                                            {{\App\Helpers\AppHelper::datetime_on_user_timezone($dog->created_at)}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('dashboard.dogs._shared')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#accept-btn').click(function () {
                const dogId = "{{$dog->id}}"
                const status = "{{\App\Constants\DogStatus::ADOPTED}}"
                toggleStatus(status, dogId);
            })

            $('#reject-btn').click(function () {
                const dogId = "{{$dog->id}}"
                const status = "{{\App\Constants\DogStatus::AVAILABLE}}"
                toggleStatus(status, dogId);
            })
        })

        const toggleStatus = (status, id) => {
            $.ajax({
                "url": BASE_URL + `/dashboard/dogs/${id}/toggle-status`,
                "dataType": "json",
                "type": "POST",
                "data": {"_token": CSRF_TOKEN, 'status': status},
                success: function (resp) {
                    alertifySuccess(resp.message);
                    location.reload();
                },
                error: function (xhr) {
                    const message = xhr.responseJSON?.message !== "" ? xhr.responseJSON?.message : "Something went wrong!!!";
                    toastError(message);
                }
            })
        }
    </script>
@endpush
