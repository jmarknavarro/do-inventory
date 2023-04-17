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

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-select w-100" name="dept" id="categoryDropdown"
                                                onchange="updateProductDropdown()">
                                                <option value="all-1">All Department</option>
                                                <option value="osds">OSDS</option>
                                                <option value="vegetable">CID</option>
                                                <option value="vegetable">SGOD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <!-- <select class="form-select w-100" id="select-size" name="office"></select> -->

                                            <select class="form-select w-100" id="productDropdown">
                                                <option value="">All Office</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-group">
                                            <a class="btn app-btn-secondary" href="new-record.php">
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

                    <div class="all-1 tabcontent" id="orders-table-tab-content">

                        <nav id="orders-table-tab"
                            class="orders-table-tab app-nav-tabs nav flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab"
                                data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all"
                                aria-selected="true">All</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                                href="#desktop-all" role="tab" aria-controls="desktop-all"
                                aria-selected="false">Desktop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#laptop-all" role="tab" aria-controls="laptop-all"
                                aria-selected="false">Laptop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#tablet-all" role="tab" aria-controls="tablet-all"
                                aria-selected="false">Tablet</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#printer-all" role="tab" aria-controls="printer-all"
                                aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" name="orders-all" id="orders-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Devices</h6>
                                            <table id="list_std" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row = $view->fetchAllData();
                                                ?>
                                            </table>
                                        </div>
                                        <!--//table-responsive-->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Laptop</h6>
                                            <table id="list_std2" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->fetchAllLaptop();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Printer</h6>
                                            <table id="list_std3" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->fetchAllPrinter();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tablet-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Tablet</h6>
                                            <table id="list_std17" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->fetchAllTablet();
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">

                                        <div class="table-responsive">
                                            <h6>All Desktop</h6>
                                            <table id="list_std4" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->fetchAllDesktop();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ICT-Services tabcontent" id="orders-table-tab-content">

                        <nav id="orders-table-tab"
                            class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab"
                                data-bs-toggle="tab" href="#osds-all" role="tab" aria-controls="orders-all"
                                aria-selected="true">All</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                                href="#osds-desktop-all" role="tab" aria-controls="osds-desktop-all"
                                aria-selected="false">Desktop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#osds-laptop-all" role="tab" aria-controls="osds-laptop-all"
                                aria-selected="false">Laptop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#osds-tablet-all" role="tab" aria-controls="osds-tablet-all"
                                aria-selected="false">Tablet</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#osds-printer-all" role="tab"
                                aria-controls="osds-printer-all" aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="osds-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Devices</h6>
                                            <table id="list_std5" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row = $view->OSDS();
                                                ?>
                                            </table>
                                        </div>

                                        <!--//table-responsive-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="osds-laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Laptop</h6>
                                            <table id="list_std8" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->osdsLaptop();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="osds-printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Printer</h6>
                                            <table id="list_std9" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->OSDSPrinter();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="osds-desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">

                                        <div class="table-responsive">
                                            <h6>All Desktop</h6>
                                            <table id="list_std10" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->osdsDesktop();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="osds-tablet-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Printer</h6>
                                            <table id="list_std18" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->osdsTablet();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cid-3 tabcontent" id="orders-table-tab-content">

                        <nav id="orders-table-tab"
                            class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab"
                                data-bs-toggle="tab" href="#cid-all" role="tab" aria-controls="cid-all"
                                aria-selected="true">All</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                                href="#cid-desktop-all" role="tab" aria-controls="cid-desktop-all"
                                aria-selected="false">Desktop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#cid-laptop-all" role="tab" aria-controls="cid-laptop-all"
                                aria-selected="false">Laptop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#cid-tablet-all" role="tab" aria-controls="cid-tablet-all"
                                aria-selected="false">Tablet</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#cid-printer-all" role="tab" aria-controls="cid-printer-all"
                                aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="cid-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Devices</h6>
                                            <table id="list_std6" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row = $view->CID();
                                                ?>
                                            </table>
                                        </div>
                                        <!--//table-responsive-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cid-laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Laptop</h6>
                                            <table id="list_std11" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->cidLaptop();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cid-printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Printer</h6>
                                            <table id="list_std12" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->cidPrinter();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cid-tablet-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Printer</h6>
                                            <table id="list_std19" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->cidTablet();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cid-desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">

                                        <div class="table-responsive">
                                            <h6>All Desktop</h6>
                                            <table id="list_std13" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->cidDesktop();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sgod-4 tabcontent" id="orders-table-tab-content">

                        <nav id="orders-table-tab"
                            class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab"
                                data-bs-toggle="tab" href="#sgod-all" role="tab" aria-controls="sgod-all"
                                aria-selected="true">All</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                                href="#sgod-desktop-all" role="tab" aria-controls="sgod-desktop-all"
                                aria-selected="false">Desktop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#sgod-laptop-all" role="tab" aria-controls="sgod-laptop-all"
                                aria-selected="false">Laptop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#sgod-tablet-all" role="tab" aria-controls="sgod-tablet-all"
                                aria-selected="false">Tablet</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#sgod-printer-all" role="tab"
                                aria-controls="sgod-printer-all" aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="sgod-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Devices</h6>
                                            <table id="list_std7" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row = $view->SGOD();
                                                ?>
                                            </table>
                                        </div>
                                        <!--//table-responsive-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sgod-laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Laptop</h6>
                                            <table id="list_std14" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->sgodLaptop();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sgod-printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Printer</h6>
                                            <table id="list_std15" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->sgodPrinter();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sgod-tablet-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Printer</h6>
                                            <table id="list_std20" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->sgodTablet();

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sgod-desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table mb-5">
                                    <div class="app-card-body p-3">

                                        <div class="table-responsive">
                                            <h6>All Desktop</h6>
                                            <table id="list_std16" class="table app-table-hover mb-0 text-left">
                                                <?php
                                                $view = new class_model();
                                                $row  = $view->sgodDesktop();

                                                ?>
                                            </table>
                                        </div>
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
        <script>
        // Define the products for each category
        const products = {
            osds: ['ICT Services', 'Banana', 'Orange'],
            vegetable: ['Carrot', 'Broccoli', 'Cauliflower'],
            vegetable: ['Carrot', 'Broccoli', 'Cauliflower']
        };

        // Function to update the options in the product dropdown based on the category selection
        function updateProductDropdown() {
            const categoryDropdown = document.getElementById('categoryDropdown');
            const productDropdown = document.getElementById('productDropdown');

            // Get the selected category
            const selectedCategory = categoryDropdown.value;

            // Clear the current options in the product dropdown
            productDropdown.innerHTML = '<option value="">All Office</option>';

            // If a category is selected, add the corresponding products to the product dropdown
            if (selectedCategory) {
                // Get the products for the selected category
                const categoryProducts = products[selectedCategory];

                // Add the products to the product dropdown
                categoryProducts.forEach(product => {
                    const option = document.createElement('option');
                    option.text = product;
                    option.value = product;
                    productDropdown.add(option);
                });
            }
        }
        </script>
    </body>

    </html>