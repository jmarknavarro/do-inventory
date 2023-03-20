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
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.css" />
        <!-- FontAwesome JS-->
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>

        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">

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
                            <div class="search-mobile-trigger d-sm-none col">
                                <i class="search-mobile-trigger-icon fas fa-search"></i>
                            </div>
                            <!--//col-->
                            <div class="app-search-box col">
                                <form class="app-search-form">
                                    <input type="text" placeholder="Search..." name="search"
                                        class="form-control search-input">
                                    <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                            class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <!--//app-search-box-->

                            <div class="app-utilities col-auto">
                                <div class="app-utility-item app-notifications-dropdown dropdown">

                                    <!--//dropdown-toggle-->

                                    <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                                        <div class="dropdown-menu-header p-3">
                                            <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                                        </div>
                                        <!--//dropdown-menu-title-->
                                        <div class="dropdown-menu-content">
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <img class="profile-image"
                                                            src="../assets/images/profiles/profile-1.png" alt="">
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">Amy shared a file with you. Lorem ipsum
                                                                dolor
                                                                sit amet, consectetur adipiscing elit. </div>
                                                            <div class="meta"> 2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="notifications.html"></a>
                                            </div>
                                            <!--//item-->
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="app-icon-holder">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                                class="bi bi-receipt" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                                <path fill-rule="eveno  dd"
                                                                    d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">You have a new invoice. Proin venenatis
                                                                interdum est.</div>
                                                            <div class="meta"> 1 day ago</div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="notifications.html"></a>
                                            </div>
                                            <!--//item-->
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="app-icon-holder icon-holder-mono">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                                class="bi bi-bar-chart-line" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">Your report is ready. Proin venenatis
                                                                interdum
                                                                est.</div>
                                                            <div class="meta"> 3 days ago</div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="notifications.html"></a>
                                            </div>
                                            <!--//item-->
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <img class="profile-image"
                                                            src="../assets/images/profiles/profile-2.png" alt="">
                                                    </div>
                                                    <!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">James sent you a new message.</div>
                                                            <div class="meta"> 7 days ago</div>
                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                </div>
                                                <!--//row-->
                                                <a class="link-mask" href="notifications.html"></a>
                                            </div>
                                            <!--//item-->
                                        </div>
                                        <!--//dropdown-menu-content-->

                                        <div class="dropdown-menu-footer p-2 text-center">
                                            <a href="notifications.html">View all</a>
                                        </div>

                                    </div>
                                    <!--//dropdown-menu-->
                                </div>
                                <!--//app-utility-item-->
                                <!--//app-utility-item-->

                                <div class="app-utility-item app-user-dropdown dropdown">
                                    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#" role="button" aria-expanded="false"><img
                                            src="../assets/images/user.png" alt="user profile"></a>
                                    <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                        <li><a class="dropdown-item" href="account.html">Account</a></li>
                                        <li><a class="dropdown-item" href="settings.html">Settings</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                                    </ul>
                                </div>
                                <!--//app-user-dropdown-->
                            </div>
                            <!--//app-utilities-->
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
                        <a class="app-logo" href="index.html"><img class="logo-icon me-2 "
                                src="../assets/images/logo_do.png" alt="logo"></a>
                    </div>
                    <!--//app-branding-->
                    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                        <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="index.html">
                                    <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
  <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>
</svg>
                                    </span>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                                <!--//nav-link-->
                                <!-- Orders -->
                            <li class="nav-item has-submenu">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
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
                <div class="container-xl">

                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Inventory</h1>
                        </div>
                        <div class="col-auto">
                            <div class="page-utilities">
                                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                    <div class="col-auto">
                                        <select class="form-select w-auto" data-live-search="true">
                                            <option value="all-1" selected>All</option>
                                            <option value="osds-2">OSDS</option>
                                            <option value="cid-3">CID</option>
                                            <option value="sgod-4">SGOD</option>

                                        </select>

                                    </div>

                                    <div class="col-auto">
                                        <a class="btn app-btn-secondary" href="#">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            &nbsp New Record
                                        </a>
                                    </div>
                                </div>
                                <!--//row-->
                            </div>
                            <!--//table-utilities-->
                        </div>
                        <!--//col-auto-->
                    </div>
                    <!--//row-->


                    <div class="all-1 tabcontent" id="orders-table-tab-content">

                        <nav id="orders-table-tab"
                            class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab"
                                data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all"
                                aria-selected="true">All</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                                href="#desktop-all" role="tab" aria-controls="desktop-all"
                                aria-selected="false">Desktop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab"
                                data-bs-toggle="tab" href="#laptop-all" role="tab" aria-controls="laptop-all"
                                aria-selected="false">Laptop</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#printer-all" role="tab" aria-controls="printer-all"
                                aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="orders-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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

                    <div class="osds-2 tabcontent" id="orders-table-tab-content">

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
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#osds-printer-all" role="tab"
                                aria-controls="osds-printer-all" aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="osds-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="osds-laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="osds-printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="osds-desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#cid-printer-all" role="tab" aria-controls="cid-printer-all"
                                aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="cid-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="cid-laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="cid-printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="cid-desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
                                    <div class="app-card-body p-3">

                                        <div class="table-responsive mt-5">
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
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab"
                                data-bs-toggle="tab" href="#sgod-printer-all" role="tab"
                                aria-controls="sgod-printer-all" aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="sgod-all" role="tabpanel"
                                aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="sgod-laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive mt-5">
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
                            <div class="tab-pane" id="sgod-printer-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
                            <div class="tab-pane" id="sgod-desktop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
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
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.js"></script>
        </script>


        <!-- Page Specific JS -->
        <script src="../assets/js/app.js"></script>




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