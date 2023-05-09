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
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.css" />
        <!-- FontAwesome JS-->
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>

        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
        <link rel="stylesheet" href="../assets/css/selectize.css">


    </head>

    <body class="app">
         <!-- Header -->
       <?php include './header/main_header.php';?>
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
                                                    <select class="form-select" id="dept" name="dept" >
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
                                                    <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group pt-2">
                                                    <label class="col-form-label">Serial No.</label>
                                                    <input type="text" id="s_num" name="s_num" class="form-control" value="<?php echo isset($s_num) ? $s_num : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group pt-2">
                                                    <label class="col-form-label">Device Description</label>
                                                    <input type="text" id="desc" name="desc" class="form-control" value="<?php echo isset($desc) ? $desc : ''; ?>">
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
					                            <option value="" selected disabled>Select Warranty Status</option>
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
                                                    <textarea class="form-control" id="remarks" maxlength="40" placeholder=""
                                                        name="remarks" ><?php echo isset($remarks) ? $remarks : ''; ?></textarea>

                                                </div>
                                            </div>

                                            <div class="app-card-footer text-end py-4 mt-auto">
                                                <input type="button" name="reset" class="btn btn-outline-danger"
                                                    value="Clear" onclick="ResetTransaction()" />
                                                <a class="btn btn-outline-secondary mx-1"
                                                    href="inventory.php">Cancel</a>
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