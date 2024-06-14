@extends('layouts.dashboard')
@section('content')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="d-flex justify-content-between">
                <h3 class="box-title">User Datatable</h3>
{{--                <p class="text-muted">Add class <code>.table</code></p>--}}
                <a href="{{route('users.create')}}" class="col-md-1 btn btn-primary">Add</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap" id="userDatatable">
                        <thead>
                        <tr>
                            <th class="border-top-0">S.N</th>
                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Email</th>
                            <th class="border-top-0">Role</th>
                            <th class="border-top-0">Created At</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
@endsection
@push('scripts')
    @include('dashboard.users._shared')
    <script>
        let table = $('#userDatatable').DataTable({
            "serverSide": true,
            "ajax": {
                "url": BASE_URL + '/dashboard/users',
                "dataType": "json",
                "type": "GET",
                "data": {
                    "_token": CSRF_TOKEN
                },
                "tryCount": 0,
                "retryLimit": 3,
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr);
                }
            },
            "columns": [
                {"data": "id",},
                {"data": "name",},
                {"data": "email"},
                {"data": "role"},
                {"data": "created_at"},
                {"data": "action", "searchable": false, "orderable": false}
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
            "dom": '<"top">rt<" bottom.d-md-flex.justify-content-between"lip><"clear">',
            "language": {"emptyTable": " "},

        });
        $('.table-search').on('keyup', function () {
            // if(this.value.length > 2){
            table.search(this.value).draw();
            // }
        });
    </script>
@endpush
