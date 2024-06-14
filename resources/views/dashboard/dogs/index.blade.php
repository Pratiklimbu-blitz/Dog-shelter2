@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="d-flex justify-content-between">
                <h3 class="box-title">Dog Datatable</h3>
                <a href="{{route('dogs.create')}}" class=" mr-2 ml-2 btn btn-primary">Add</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap" id="dogDatatable">
                        <thead>
                        <tr>
                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Image</th>
                            <th class="border-top-0">Category</th>
                            <th class="border-top-0">Status</th>
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
@endsection
@push('scripts')
    @include('dashboard.dogs._shared')
    <script>
        let table = $('#dogDatatable').DataTable({
            "serverSide": true,
            "ajax": {
                "url": BASE_URL + '/dashboard/dogs',
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
                {"data": "name",},
                {"data": "image", "searchable": false, "orderable": false},
                {"data": "type"},
                {"data": "status"},
                {"data": "created_at"},
                {"data": "action", "searchable": false, "orderable": false}
            ],
            "rowId": 'id',
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [
                [25, 50, 100, 500],
                [25, 50, 100, 500]
            ],
            "pageLength": 25,
            "deferRender": true,
            fixedHeader: true,
            "searchable": false,
            "dom": '<"top">rt<" bottom.d-md-flex.justify-content-between"lip><"clear">',
            "language": {"emptyTable": " "},

        });
        $('.table-search').on('keyup', function () {
            table.search(this.value).draw();
        });
    </script>
@endpush
