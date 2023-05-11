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
        <title>New Record</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="16x16" href="/do-inventory/assets/images/favicon.ico">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.css" />
        <!-- FontAwesome JS-->
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>

        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
        <link rel="stylesheet" href="../assets/css/selectize.css">


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


                                <a class="nav-link" href="../dashboard" title="Dashboard" aria-expanded="false" aria-controls="submenu-1">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                            <path
                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                        </svg>
                                    </span>
                                </a>

                                <a class="nav-link" href="archive" title="Archive Records" aria-expanded="false" aria-controls="submenu-1">
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
        <!-- Header -->

        <div class="app-wrapper">

            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">

                    <h1 class="app-page-title">Add New Record</h1>
                    <div class="row gy-4">
                        <div class="col-12 col-lg-12">
                            <div class="app-card app-card-account d-flex flex-column align-items-start">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <div class="app-icon-holder">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <h4 class="app-card-title">Record Info</h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="app-card-body px-4 w-100">
                                    <?php require('../init/controllers/form_process.php') ?>
                                    <form id="user-form" enctype='multipart/form-data' method="POST">
                                        <?php if ($message != "") {
                                echo '<div class="alert alert-danger">' . $message . '</div>';
                            } ?>
                                        <?php if ($s_message != "") {
                                echo '<div class="alert alert-success">' . $s_message . '</div>';
                            } ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Department</label>
                                                    <select class="form-select" id="dept" name="dept">
                                                        <option value="" selected disabled>Select Department</option>;
                                                        <?php  
                                                  $view = new class_model();
                                                  $view->fetchDept();
                                                  ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Office/Unit</label>
                                                    <select class="form-select" id="office" name="office">
                                                        <option value="" selected disabled>Select Department</option>;
                                                        <?php  
                                                  $view = new class_model();
                                                  $view->fetchOffice();
                                                  ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-2">
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


                                            <div class="col-md-6">
                                                <div class="form-group pt-2">
                                                    <label class="col-form-label">Name</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="<?php echo isset($name) ? $name : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group pt-2">
                                                    <label class="col-form-label">Serial No.</label>
                                                    <input type="text" id="s_num" name="s_num" class="form-control"
                                                        value="<?php echo isset($s_num) ? $s_num : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group pt-2">
                                                    <label class="col-form-label">Device Description</label>
                                                    <input type="text" id="desc" name="desc" class="form-control"
                                                        value="<?php echo isset($desc) ? $desc : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group pt-2">
                                                    <label class="col-form-label">Year Issued</label>

                                                    <select class="form-select" id="year" name="year">
                                                        <option value="0000" selected disabled>Select Year</option>;
                                                        <?php  
                                                  $view = new class_model();
                                                  $view->years();
                                                  
                                                  ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group pt-2 ">
                                                    <label class="col-form-label">Warranty Status</label>
                                                    <select class="form-select" id="w_stat" name="w_stat">
                                                        <option value="" selected disabled>Select Warranty Status
                                                        </option>
                                                        <option>UNDER WARRANTY</option>
                                                        <option>OUT OF WARRANTY</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group pt-2 ">
                                                    <label class="col-form-label">Status</label>
                                                    <select class="form-select" id="stat" name="stat">
                                                        <option value="" selected disabled>Select Status</option>;
                                                        <option>FUNCTIONAL</option>
                                                        <option>NOT FUNCTIONAL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group pt-2">
                                                    <label class="col-form-label">Remarks</label>
                                                    <textarea class="form-control" id="remarks" maxlength="40"
                                                        placeholder=""
                                                        name="remarks"><?php echo isset($remarks) ? $remarks : ''; ?></textarea>

                                                </div>
                                            </div>

                                            <div class="app-card-footer text-end py-4 mt-auto">
                                                <input type="button" name="reset" class="btn btn-outline-danger"
                                                    value="Clear" onclick="ResetTransaction()" />
                                                <a class="btn btn-outline-secondary mx-1" href="../dashboard">Cancel</a>
                                                <input type="submit" name="submitr" class="btn app-btn-primary"></input>
                                            </div>

                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>


        <!-- Javascript -->
        <script src="../assets/plugins/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.js"></script>
        </script>
        <script src="../assets/js/app.js"></script>
        <!-- Selectize JS -->
        <script src="../assets/js/selectize.js"></script>
        <script>
        var $dept = $('#dept').selectize();
        var $office = $('#office').selectize();
        var $cat = $('#cat').selectize();
        var $year = $('#year').selectize();
        var $w_stat = $('#w_stat').selectize();
        var $stat = $('#stat').selectize();
        </script>

        <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        // window.setTimeout(function() {
        //     $(".alert").fadeTo(500, 0).slideUp(500, function() {
        //         $(this).remove();
        //     });
        // }, 2000);
        </script>

        <script>
        $(document).ready(function() {

            load_data();
            var count = 1;

            function load_data() {

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