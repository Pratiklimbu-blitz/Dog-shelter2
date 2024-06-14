<script>
    function deleteCategory(id, redirect = false) {
        let table = 'categoryDatatable';
        let action = BASE_URL + "/dashboard/categories/" + id;
        $.ajax({
            "url": action,
            "dataType": "json",
            "type": "DELETE",
            "data": {"_token": CSRF_TOKEN},
            beforeSend: function () {
                removeRowFromTable(table, id);
            },
            success: function (resp) {
                if (redirect) {
                    alertifySuccessAndRedirect(resp.message, "{{route('categories.index')}}");
                } else {
                    alertifySuccess(resp.message);
                }
            },
            error: function (xhr) {
                showRowFromTable(table, id);
                const message = xhr.responseJSON?.message !== "" ? xhr.responseJSON?.message : "Something went wrong!!!";
                toastError(message);
            }
        });
    }
</script>
