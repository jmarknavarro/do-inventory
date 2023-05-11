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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://use.typekit.net/xit8hti.css">
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
        <link rel="stylesheet" href="../assets/vendor/sweetalert2/dist/sweetalert2.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    </head>

    <body class="app">

        <div id="preloader">
            <div id="status">
                <img src="../assets/images/loader.gif" alt="Loading..." />
            </div>
        </div>

        <!-- Header -->
        <header class="app-header fixed-top">
            <div class="app-header-inner">
                <div class="container-fluid py-2">
                    <div class="app-header-content">
                        <div class="row">

                            <div class="col-auto">
                                <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
                <div id="sidepanel-drop" class="sidepanel-drop"></div>
                <div class="sidepanel-inner d-flex flex-column">
                    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                    <div class="app-branding">
                        <a class="app-logo" href="../dashboard"><img class="logo-icon" src="../assets/images/logo.png"
                                alt="logo"></a>
                    </div>
                    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                        <ul class="app-menu list-unstyled align-items-center justify-content-center"
                            id="menu-accordion">
                            <li class="nav-item">


                                <a class="nav-link submenu-toggle active" title="Dashboard" href="../dashboard" aria-expanded="false"
                                    aria-controls="submenu-1">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi-active bi bi-house" viewBox="0 0 16 16">
                                            <path
                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                        </svg>
                                    </span>
                                </a>

                                <a class="nav-link" title="Archive Records" href="archive" aria-expanded="false" aria-controls="submenu-1">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </span>
                                </a>

                            </li>
                        </ul>
                    </nav>
                    <div class="app-sidepanel-footer">
                        <nav class="app-nav app-nav-footer">
                            <ul class="app-menu footer-menu list-unstyled">
                                <li class="nav-item">

                                    <a class="nav-link" title="Logout" href="logout" aria-expanded="false" aria-controls="submenu-1">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                                <path fill-rule="evenodd"
                                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                            </svg>
                                        </span>
                                    </a>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div class="app-wrapper">

            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-fluid">

                    <div id="choice"></div>

                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Inventory Records of ICT Equipment</h1>
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
                            </div>
                        </div>
                    </div>

                    <div id="message"></div>
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
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
                </div>
            </div>

        </div>


        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="../assets/plugins/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
        <script
            src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/fc-4.2.2/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js">
        </script>
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
                                    title: 'Archived',
                                    text: 'Record has been archived.',
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