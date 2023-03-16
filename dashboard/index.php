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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.css" />
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                                        <title>Menu</title>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
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
                                    <input type="text" placeholder="Search..." name="search" class="form-control search-input">
                                    <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button>
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
                                                        <img class="profile-image" src="../assets/images/profiles/profile-1.png" alt="">
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
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                                <path fill-rule="eveno  dd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
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
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
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
                                                        <img class="profile-image" src="../assets/images/profiles/profile-2.png" alt="">
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
                                    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="../assets/images/user.png" alt="user profile"></a>
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
                        <a class="app-logo" href="index.html"><span class="logo-text">ICT SERVICES</span></a>

                    </div>
                    <!--//app-branding-->
                    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                        <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="index.html">
                                    <span class="nav-icon">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                                <!--//nav-link-->
                                <!-- Orders -->
                            <li class="nav-item has-submenu">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                                    <span class="nav-icon">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                                            <circle cx="3.5" cy="5.5" r=".5" />
                                            <circle cx="3.5" cy="8" r=".5" />
                                            <circle cx="3.5" cy="10.5" r=".5" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Orders</span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                    <!--//submenu-arrow-->
                                </a>
                                <!--//nav-link-->
                                <div id="submenu-1" class="collapse submenu submenu-1 show" data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        <li class="submenu-item"><a class="submenu-link active" href="notifications.html">Notifications</a></li>
                                        <li class="submenu-item"><a class="submenu-link" href="account.html">Account</a>
                                        </li>
                                        <li class="submenu-item"><a class="submenu-link" href="settings.html">Settings</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <!--//nav-item-->
                            <li class="nav-item has-submenu">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                                    <span class="nav-icon">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                                            <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Pages</span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                    <!--//submenu-arrow-->
                                </a>
                                <!--//nav-link-->
                                <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        <li class="submenu-item"><a class="submenu-link" href="notifications.html">Notifications</a></li>
                                        <li class="submenu-item"><a class="submenu-link" href="account.html">Account</a>
                                        </li>
                                        <li class="submenu-item"><a class="submenu-link" href="settings.html">Settings</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <!--//nav-item-->
                            <li class="nav-item has-submenu">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
                                    <span class="nav-icon">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">External</span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                    <!--//submenu-arrow-->
                                </a>
                                <!--//nav-link-->
                                <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        <li class="submenu-item"><a class="submenu-link" href="login.html">Login</a>
                                        </li>
                                        <li class="submenu-item"><a class="submenu-link" href="signup.html">Signup</a>
                                        </li>
                                        <li class="submenu-item"><a class="submenu-link" href="reset-password.html">Reset
                                                password</a></li>
                                        <li class="submenu-item"><a class="submenu-link" href="404.html">404 page</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--//nav-item-->

                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="charts.html">
                                    <span class="nav-icon">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Reports</span>
                                </a>
                                <!--//nav-link-->
                            </li>
                            <!--//nav-item-->
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="help.html">
                                    <span class="nav-icon">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Help</span>
                                </a>
                                <!--//nav-link-->
                            </li>
                            <!--//nav-item-->
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

                        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#desktop-all" role="tab" aria-controls="desktop-all" aria-selected="false">Desktop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab" data-bs-toggle="tab" href="#laptop-all" role="tab" aria-controls="laptop-all" aria-selected="false">Laptop</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#printer-all" role="tab" aria-controls="printer-all" aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
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
                                        <div class="table-responsive mt-5">
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
                                        <div class="table-responsive mt-5">
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

                                        <div class="table-responsive mt-5">
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

                        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#osds-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#desktop-all" role="tab" aria-controls="desktop-all" aria-selected="false">Desktop</a>
                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-pending-tab" data-bs-toggle="tab" href="#laptop-all" role="tab" aria-controls="laptop-all" aria-selected="false">Laptop</a>
                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#printer-all" role="tab" aria-controls="printer-all" aria-selected="false">Printer</a>
                        </nav>
                        <div class="tab-content" style="width:100%">
                            <div class="tab-pane fade show active" id="osds-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive">
                                            <h6>All Devices</h6>
                                            <table id="list_std" class="table app-table-hover mb-0 text-left">
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
                            <div class="tab-pane" id="laptop-all" role="tabpanel">
                                <div class="app-card app-card-orders-table shadow-sm mb-5">
                                    <div class="app-card-body p-3">
                                        <div class="table-responsive mt-5">
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
                                        <div class="table-responsive mt-5">
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

                                        <div class="table-responsive mt-5">
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
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sc-2.0.7/sp-2.0.2/datatables.min.js"></script>
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