$( function() {
    $( ".datepicker" ).datepicker();
} );

function removeRowFromTable(table, id) {
    $('.' + table + ' tr#' + id).hide();
}

//button
