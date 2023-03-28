

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}



function ResetTransaction() {
    document.getElementById("class_code").value = "";
    document.getElementById("subject").value = "";
    document.getElementById("school_year").value = "";
}

function ResetStudent() {
    document.getElementById("student_name").value = "";
    document.getElementById("1").value = "";
    document.getElementById("2").value = "";
    document.getElementById("3").value = "";
    document.getElementById("4").value = "";
    document.getElementById("5").value = "";
    document.getElementById("6").value = "";
    document.getElementById("7").value = "";
    document.getElementById("8").value = "";
    document.getElementById("9").value = "";
    document.getElementById("10").value = "";
    document.getElementById("11").value = "";
}

function dec(obj) {
    obj.value = parseFloat(obj.value).toFixed(2);
}


function refresh() {
    $("#list_std").load(window.location.href + " #list_std");
}




$(document).ready(function () {

    load_data();
    var count = 1;

    function load_data() {

        // DELETE TRANSACTION
        $(document).on('shown.bs.dropdown', '.table-responsive', function (e) {
            // The .dropdown container
            var $container = $(e.target);
        
            // Find the actual .dropdown-menu
            var $dropdown = $container.find('.dropdown-menu');
            if ($dropdown.length) {
                // Save a reference to it, so we can find it after we've attached it to the body
                $container.data('dropdown-menu', $dropdown);
            } else {
                $dropdown = $container.data('dropdown-menu');
            }
        
            $dropdown.css('top', ($container.offset().top + $container.outerHeight()) + 'px');
            $dropdown.css('left', $container.offset().left + 'px');
            $dropdown.css('position', 'absolute');
            $dropdown.css('display', 'block');
            $dropdown.appendTo('body');
        });
        
        $(document).on('hide.bs.dropdown', '.table-responsive', function (e) {
            // Hide the dropdown menu bound to this button
            $(e.target).data('dropdown-menu').css('display', 'none');
        });


        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".tabcontent").not("." + optionValue).hide();
                    $("." + optionValue).fadeIn();
                } else{
                    $(".tabcontent").fadeOut();
                }
            });
        }).change();





        $(document).on('click', '.delete', function () {
            var transId = $(this).attr("data-id");

            if (Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                confirmButtonText: 'Confirm',
                cancelButtonText: "Cancel",
                text: 'Do you really want to cancel these record? This process cannot be undone.',
                showCancelButton: true,
                reverseButtons: true

            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Cancel',
                        text: 'Record has been cancelled.',
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $.ajax({
                        url: "/coco/init/controllers/delete_transaction.php",
                        method: "POST",
                        data: {
                            transId: transId
                        },
                        success: function (response) {
                            $("#message").html(response);
                        },
                        error: function (response) {
                            console.log("Failed");
                        }
                    })

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            }));
        });

        // ARCHIVE TRANSACTION
        $(document).on('click', '.archive', function () {
            var id = $(this).attr("data-id");
            console.log(id);
            if (Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'Do you really want to archive these record?',
                showCancelButton: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Archive',
                        text: 'Record has been archive.',
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                    $.ajax({
                        url: "/coco/init/controllers/archive_transaction.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function (response) {
                            $("#message").html(response);
                        },
                        error: function (response) {
                            console.log("Failed");
                        }
                    })

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            }));
        });


        // DELTETE STUDENT
        $(document).on('click', '.delete-std', function () {
            var id = $(this).attr("data-id");
            if (Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'Do you really want to cancel these record? This process cannot be undone.',
                showCancelButton: true,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Cancel',
                        text: 'Record has been cancelled.',
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                    $.ajax({
                        url: "/coco/init/controllers/delete_student.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function (response) {
                            $("#message").html(response);
                        },
                        error: function (response) {
                            console.log("Failed");
                        }
                    })

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            }));
        });

        // TABLE
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        $('#list_transaction').DataTable({
            scrollX: true,
            lengthChange: true,
            searching: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [5] } ],
            order: [[5, "desc"]],
            language: {
                emptyTable: "No transaction have been created yet"
            }
        });

        $('#list_transaction_cog').DataTable({
            scrollX: true,
            lengthChange: true,
            searching: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[6, "desc"]],
            language: {
                emptyTable: "No transaction have been created yet"
            }
        });


        $('#list_grades').DataTable({
            scrollX: true,
            lengthChange: false,
            searching: true,
            paging: false,
            info: true,
            language: {
                emptyTable: "No request have been created yet"
            }
        });

        $('#list_transaction_logs').DataTable({

            scrollX: true,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5 mt-3'B><'col-sm-12 col-md-7'p>>",
                columnDefs: [ { type: 'date', 'targets': [5] } ],
                order: [[5, "desc"]],
            buttons: {
                buttons: [{
                    extend: 'copy',
                    title: `Transaction Logs - ${ new Date().toLocaleDateString()}`,
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'excel',
                    title: `Transaction Logs - ${ new Date().toLocaleDateString()}`,
                    className: 'btn btn-outline-info  btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    title: `Transaction Logs - ${ new Date().toLocaleDateString()}`,
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    title: `Transaction Logs - ${ new Date().toLocaleDateString()}`,
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }
                ],
                dom: {
                    button: {
                        className: 'btn'
                    }
                }
            },
        });

        $('#list_transaction_reports').DataTable({

            scrollX: true,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5 mt-3'B><'col-sm-12 col-md-7'p>>",
                columnDefs: [ { type: 'date', 'targets': [6] } ],
                order: [[6, "desc"]],
            buttons: {
                buttons: [{
                    extend: 'copy',
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-outline-info  btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                }
                ],
                dom: {
                    button: {
                        className: 'btn'
                    }
                }
            },
        });

        $('#list_transaction_reports_COG').DataTable({

            scrollX: true,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5 mt-3'B><'col-sm-12 col-md-7'p>>",
                columnDefs: [ { type: 'date', 'targets': [7] } ],
                order: [[7, "desc"]],
            buttons: {
                buttons: [{
                    extend: 'copy',
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-outline-info  btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-outline-info btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                }
                ],
                dom: {
                    button: {
                        className: 'btn'
                    }
                }
            },
        });

        

        $('#list_transaction_cog_1').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[6, "desc"]],
        });

        $('#list_transaction_cog_2').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[6, "desc"]],
        });
        $('#list_transaction_cog_3').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[6, "desc"]],
        });
        $('#list_transaction_cog_4').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[6, "desc"]],
        });

        $('#list_transaction_1').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [5] } ],
            order: [[5, "desc"]],
        });

        $('#list_transaction_2').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [5] } ],
            order: [[5, "desc"]],
        });

        $('#list_transaction_3').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [5] } ],
            order: [[5, "desc"]],
        });

        $('#list_transaction_4').DataTable({
            scrollX: true,
            lengthChange: true,
            paging: true,
            info: true,
            columnDefs: [ { type: 'date', 'targets': [5] } ],
            order: [[5, "desc"]],
        });

        $('#recent_transaction_1').DataTable({
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[6, "desc"]],
        });

        $('#recent_transaction_2').DataTable({
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[5, "desc"]],
        });

        $('#recent_transaction_3').DataTable({
            columnDefs: [ { type: 'date', 'targets': [6] } ],
            order: [[5, "desc"]],
        });




    }

});
