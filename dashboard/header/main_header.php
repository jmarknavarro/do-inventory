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
                        </div>
                    </div>
                </div>
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
                            <li class="nav-small-cap"><span class="hide-menu">Menu</span></li>

                            <li class="nav-item has-submenu">
                                <a class="nav-link submenu-toggle active" href="../dashboard"
                                    data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                                    <span class="nav-icon">
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