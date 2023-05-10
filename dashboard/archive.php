    <?php
    require $_SERVER['DOCUMENT_ROOT'] . '/do-inventory/init/model/class_model.php';
    session_start();

    // check user login
    if (empty($_SESSION['user'])) {
        header("Location: ../");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Dashboard</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="16x16" href="/do-inventory/assets/images/favicon.ico">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
        <link
            href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/fc-4.2.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css"
            rel="stylesheet" />

        <!-- FontAwesome JS-->
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
        <link rel="stylesheet" href="../assets/vendor/sweetalert2/dist/sweetalert2.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    </head>

    <body class="app">
       <!-- Header -->
       <?php include './header/main_header.php';?>


        <div class="app-wrapper">

            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-fluid">

                    <div id="choice"></div>

                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Archive Records</h1>
                        </div>
                        <div class="col-md-8">
                            <div class="page-utilities">
                                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <!-- <button type="button" class="btn btn app-btn-secondary me-1"
                                                data-bs-toggle="modal" data-bs-target="#filterModal"> <i
                                                    class="fa fa-sliders" aria-hidden="true"></i>
                                                Filter</button>
                                            <div id="filterTopCriteria"></div>
                                            <a class="btn app-btn-primary" href="new-record">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                &nbsp New Record
                                            </a> -->
                                        </div>
                                    </div>
                                </div>
                                <!--//row-->
                            </div>
                            <!--//table-utilities-->
                        </div>
                        <!--//col-auto-->
                    </div>
                    <!--//row-->

                    <div id="message"></div>
                   
                    <div class="all-1" id="orders-table-tab-content">
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" name="orders-all" id="orders-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <?php
                                                $view = new class_model();
                                                echo $row = $view->fetchArchiveData();                                      
                                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of line -->
                </div>

                <!--//container-fluid-->
            </div>
            <!--//app-content-->



        </div>
        <!--//app-wrapper-->


        <!-- Javascript -->
        <script src="../assets/plugins/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="../assets/js/bootstrap-datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script
            src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/fc-4.2.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js">
        </script>



        <!-- Page Specific JS -->
        <script src="../assets/js/app.js"></script>

        <script src="../assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <script>
        $(document).ready(function() {
           
            load_data();
            var count = 1;

            function load_data() {

                $(document).on('click', '.delete', function() {
                    var id = $(this).attr("data-id");

                    if (Swal.fire({
                            icon: 'warning',
                            title: 'Are you sure?',
                            confirmButtonText: 'Confirm',
                            cancelButtonText: "Cancel",
                            text: 'Do you really want to restore these record?',
                            showCancelButton: true,
                            reverseButtons: true

                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Archive',
                                    text: 'Record has been Archived.',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $.ajax({
                                    url: "/do-inventory/init/controllers/uarchive_process.php",
                                    method: "POST",
                                    data: {
                                        id: id
                                    },
                                    success: function(response) {
                                        $("#message").html(response);
                                    },
                                    error: function(response) {
                                        console.log("Failed");
                                    }
                                })

                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        }));
                });


                // HIDE DIVS
                $("select").change(function() {
                    $(this).find("option:selected").each(function() {
                        var optionValue = $(this).attr("value");
                        if (optionValue) {
                            $(".tabcontent").not("." + optionValue).hide();
                            $("." + optionValue).fadeIn();
                        } else {
                            $(".tabcontent").fadeOut();
                        }
                    });
                }).change();
            }



        });
        </script>



    </body>

    </html>