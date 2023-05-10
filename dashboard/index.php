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
                            <h1 class="app-page-title mb-0">ICT Equipment Inventory</h1>
                        </div>
                        <div class="col-md-8">
                            <div class="page-utilities">
                                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <button type="button" class="btn btn app-btn-secondary me-1"
                                                data-bs-toggle="modal" data-bs-target="#filterModal"> <i
                                                    class="fa fa-sliders" aria-hidden="true"></i>
                                                Filter</button>
                                            <div id="filterTopCriteria"></div>
                                            <a class="btn app-btn-primary" href="new-record">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                &nbsp New Record
                                            </a>
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
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-filter"></i>
                                        Filter</button></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="col-form-label">Department</label>
                                                <select class="form-select" id="dept" name="dept">
                                                    <option value="" selected>All Department</option>;
                                                    <?php  
                                                  $view = new class_model();
                                                  $view->fetchDept();
                                                  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="col-form-label">Office/Unit</label>
                                                <select class="form-select" id="office" name="office">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="col-form-label">Category</label>
                                                <select class="form-select" id="cat" name="cat">
                                                    <option value="" selected>Select Category</option>;
                                                    <?php  
                                                  $view = new class_model();
                                                  $view->fetchCategory();
                                                  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">

                                            <div class="form-group pt-2 ">
                                                <label class="col-form-label">Warranty Status</label>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <select class="form-select" id="w_stats" name="w_stats">
                                                            <option value="" selected>Select Warranty Status
                                                            </option>
                                                            <option>UNDER WARRANTY</option>
                                                            <option>OUT OF WARRANTY</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group pt-2 ">
                                                <label class="col-form-label">Status</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select class="form-select" id="stat" name="stat">
                                                            <option value="" selected>Select Status
                                                            </option>
                                                            <option>FUNCTIONAL</option>
                                                            <option>NOT FUNCTIONAL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group pt-2 ">
                                                <label class="col-form-label">Year Issued</label>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-daterange input-group" id="datepicker">
                                                            <input type="text" class="input-sm form-control me-2"
                                                                name="y_from" placeholder="From" />
                                                            <input type="text" class="input-sm form-control" name="y_to"
                                                                placeholder="To" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn app-btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn app-btn-primary">Apply
                                        Filter</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="all-1" id="orders-table-tab-content">
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" name="orders-all" id="orders-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <?php
                                                $view = new class_model();
                                                    if (isset($_POST['submit'])) {
                                                        $dept = $_POST['dept'];
                                                        $office = $_POST['office'];
                                                        $cat = $_POST['cat'];
                                                        $w_stats = $_POST['w_stats'];
                                                        $stat = $_POST['stat'];
                                                        $y_from = $_POST['y_from'];
                                                        $y_to = $_POST['y_to'];
                                                        echo $row = $view->filterData($dept,$office,$cat,$w_stats,$stat,$y_from,$y_to);
                                                } else {
                                                    echo $row = $view->fetchAllData();
                                                }
                                                
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
           
            // DATE RANGE
            $('#datepicker').datepicker({
                format: "yyyy",
                minViewMode: 2,
                maxViewMode: 2,
                clearBtn: true,

            });
            // DROPDOWN
            FilterDept();

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
                            text: 'Do you really want to archive these record?',
                            showCancelButton: true,
                            reverseButtons: true

                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted',
                                    text: 'Record has been removed.',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $.ajax({
                                    url: "/do-inventory/init/controllers/delete_process.php",
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