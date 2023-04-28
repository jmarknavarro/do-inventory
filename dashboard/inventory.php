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

        <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
        <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.css" />
        <!-- FontAwesome JS-->
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>

        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
        <link rel="stylesheet" href="../assets/vendor/sweetalert2/dist/sweetalert2.css">
        <link rel="stylesheet" href="../assets/css/selectize.css">

    </head>

    <body class="app">
        <header class="app-header fixed-top">
            <div class="app-header-inner">
                <div class="container-fluid py-2">
                    <div class="app-header-content">
                        <div class="row justify-content-between align-items-center">

                            <div class="col-auto">
                                <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                        role="img">
                                        <title>Menu</title>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                            stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                    </svg>
                                </a>
                            </div>
                            <!--//col-->

                            <!--//col-->

                        </div>
                        <!--//row-->
                    </div>
                    <!--//app-header-content-->
                </div>
                <!--//container-fluid-->
            </div>
            <!--//app-header-inner-->
            <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
                <div id="sidepanel-drop" class="sidepanel-drop"></div>
                <div class="sidepanel-inner d-flex flex-column">
                    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                    <div class="app-branding">
                        <a class="app-logo" href="index.html"><img class="logo-icon me-2"
                                src="../assets/images/logo_do.png" alt="logo"></a>
                    </div>
                    <!--//app-branding-->
                    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                        <ul class="app-menu list-unstyled accordion" id="menu-accordion">

                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="index.html">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                            <path
                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                                <div class="border-bottom mb-2"></div>
                                <!--//nav-link-->
                                <!-- Orders -->
                            <li class="nav-small-cap"><span class="hide-menu">Menu</span></li>

                            <li class="nav-item has-submenu">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link submenu-toggle active" href="#" data-bs-target="#submenu-1"
                                    aria-expanded="false" aria-controls="submenu-1">
                                    <span class="nav-icon">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Inventory</span>
                                    <span class="submenu-arrow">
                                    </span>
                                    <!--//submenu-arrow-->
                                </a>
                                <!--//nav-link-->
                            </li>
                            <!--//nav-item-->
                            <li class="nav-item has-submenu">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                                    <span class="nav-icon">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                            <path
                                                d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                            <path
                                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                            <path
                                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                        </svg>
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Reports</span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                    <!--//submenu-arrow-->
                                </a>
                                <!--//nav-link-->
                                <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        <li class="submenu-item"><a class="submenu-link" href="notifications.html">ICT
                                                Services</a></li>
                                        <li class="submenu-item"><a class="submenu-link" href="account.html">Legal
                                                Services</a>
                                        </li>
                                        <li class="submenu-item"><a class="submenu-link"
                                                href="settings.html">Settings</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>


                        </ul>
                        <!--//app-menu-->
                    </nav>
                    <!--//app-nav-->
                    <div class="app-sidepanel-footer">
                        <nav class="app-nav app-nav-footer">
                            <ul class="app-menu footer-menu list-unstyled">
                                <li class="nav-item">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <a class="nav-link" href="logout.php">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                                <path fill-rule="evenodd"
                                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-text">Log Out</span>
                                    </a>
                                    <!--//nav-link-->
                                </li>
                                <!--//nav-item-->

                            </ul>
                            <!--//footer-menu-->
                        </nav>
                    </div>
                    <!--//app-sidepanel-footer-->
                </div>
                <!--//sidepanel-inner-->
            </div>
            <!--//app-sidepanel-->
        </header>
        <!--//app-header-->

        <div class="app-wrapper">

            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-fluid">

                    <div id="choice"></div>

                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Inventory</h1>
                        </div>
                        <div class="col-md-8">
                            <div class="page-utilities">
                                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <button type="button" class="btn btn app-btn-secondary me-1"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                                                    class="fa fa-sliders" aria-hidden="true"></i>
                                                Filter</button>
                                            <a class="btn app-btn-primary" href="new-record.php">
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



                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-sliders"
                                            aria-hidden="true"></i>
                                        Filter</button></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="col-form-label">Office/Unit</label>
                                                <select class="form-select" id="office" name="office">
                                                    <option value="" selected disabled>Select Office/Unit</option>;
                                                    <?php  
                                                  $view = new class_model();
                                                  $view->fetchOffice();
                                                  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="col-form-label">Category</label>
                                                <select class="form-select" id="cat" name="cat">
                                                    <option value="" selected disabled>Select Category</option>;
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
                                                            <option value="" selected disabled>Select Warranty Status
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
                                                            <option value="" selected disabled>Select Status
                                                            </option>
                                                            <option>FUNCTIONAL</option>
                                                            <option>NOT FUNCTIONAL</option>
                                                        </select>
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
                                                        $office = $_POST['office'];
                                                        $cat = $_POST['cat'];
                                                        $w_stats = $_POST['w_stats'];
                                                        $stat = $_POST['stat'];
                                                        echo $row = $view->filterData($office,$cat,$w_stats,$stat);
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
        <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="../assets/js/selectize.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.js"></script>
        </script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
        </script>

        <!-- Page Specific JS -->
        <script src="../assets/js/app.js"></script>

        <script src="../assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>



        <script>
            $office = $('#office').selectize();
        $stat = $('#stat').selectize();
        $cat = $('#cat').selectize();
        $w_stat = $('#w_stats').selectize();
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
                            text: 'Do you really want to delete these record? This process cannot be undone.',
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