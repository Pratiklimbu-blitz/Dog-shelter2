<script>
    function deleteDog(id, redirect = false) {
        let table = 'dogDatatable';
        let action = BASE_URL + "/dashboard/dogs/" + id;
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
                    alertifySuccessAndRedirect(resp.message, "{{route('dogs.index')}}");
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
