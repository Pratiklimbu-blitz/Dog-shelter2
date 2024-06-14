@extends('layouts.dashboard')
@section('title','posts')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">

                    <div class="card-header d-flex justify-content-between">
                        <h1 class="card-title table-title">
                            Posts
                        </h1>
                        <div>
                            <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary">Add</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered items-datatable">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

    @include('dashboard.posts._shared')
    <script>
        $(document).ready(function($) {
            let table = $('.items-datatable').DataTable({
                "serverSide": true,
                "ajax": {
                    "url": BASE_URL + '/dashboard/posts',
                    "dataType": "json",
                    "type": "GET",
                    "data": {
                        "_token": CSRF_TOKEN
                    },
                    "tryCount": 0,
                    "retryLimit": 2,
                    error: function(xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 500) {
                            this.tryCount++;
                            if (this.tryCount <= this.retryLimit) {
                                //try again
                                $.ajax(this);
                                return;
                            }
                        }
                        let obj = JSON.parse(xhr.responseText);
                        if (obj.message) {
                            // toastError(obj.message)
                        }
                    }
                },
                "columns": [
                    {"data": "title"},
                    {"data": "description"},
                    {"data": "image", "searchable": false, "orderable": false},
                    {"data": "created_at"},
                    {"data": "action","searchable": false,"orderable": false}
                ],
                "rowId": 'id',
                "order": [
                    [0, "asc"]
                ],
                // "lengthMenu": [[100, 200, 500, -1], [ 100, 200, 500, 'All']],
                "lengthMenu": [
                    [25, 50, 100, 500],
                    [25, 50, 100, 500]
                ],
                "pageLength": 25,
                "deferRender": true,
                fixedHeader: true,
                // "pagingType": "simple",
                "searchable": false,
                // "dom": '<"top">rt<" bottom.d-md-flex.justify-content-between"lip><"clear">',
                "language": {
                    "emptyTable": " "
                }
            });
            $('.table-search').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>


@endpush
