<script>
    function deletePost(id,redirect = false)
    {
        let table = 'items-datatable';
        let action = BASE_URL+"/dashboard/posts/"+id;
        $.ajax({
            "url": action,
            "dataType":"json",
            "type":"DELETE",
            "data":{"_token":CSRF_TOKEN},
            beforeSend:function(){
            },
            success:function(resp){
                toastr.success('Successfully Deleted');
                removeRowFromTable(table,id);
            },
            error: function(xhr){
                let obj = JSON.parse(xhr.responseText);
                toastr.error(obj.message);
            }
        });
    }
</script>