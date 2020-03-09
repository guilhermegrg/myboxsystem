<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">MyBoxSystem</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
<!--
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
-->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard</a>

                            <div class="sb-sidenav-menu-heading">Coaches</div>
                                <a class="nav-link" href="schedule_coaches.php">Schedule</a>
                                <a class="nav-link" href="user_read_list_view.php">Users</a>
                                <a class="nav-link" href="">Client Creation</a>
                            
                            
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminMain" aria-expanded="false" aria-controls="collapseAdminMain">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Main
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseAdminMain" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="user_read_list_view.php">Users</a>
                                    <a class="nav-link" href="">Password Resets</a>
                                    <a class="nav-link" href="schedule_admin.php">Schedule</a>
                                    <a class="nav-link" href="">Client Creation</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminActivity" aria-expanded="false" aria-controls="collapseAdminActivity">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Activity
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseAdminActivity" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="modality_class_read_list_view.php">Money</a>
                                    <a class="nav-link" href="modality_class_read_list_view.php">Coaches</a>
                                    <a class="nav-link" href="modality_class_read_list_view.php">Users</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminPayment" aria-expanded="false" aria-controls="collapseAdminPayment">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Payments
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseAdminPayment" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="modality_class_read_list_view.php">Warning System</a>
                                    <a class="nav-link" href="payment_method_read_list_view.php">Payment Methods</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminConfig" aria-expanded="false" aria-controls="collapseAdminConfig">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Config
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseAdminConfig" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                   <a class="nav-link" href="modality_read_list_view.php">Modality</a>
                                    <a class="nav-link" href="modality_class_read_list_view.php">Classes</a>
                                    <a class="nav-link" href="class_access_template_read_list_view.php">Class Access Templates</a>
                                    <a class="nav-link" href="discount_read_list_view.php">Discounts</a>
                                    <a class="nav-link" href="usage_discount_read_list_view.php">Usage Discounts</a>
                                    <a class="nav-link" href="periodic_service_read_list_view.php">Periodic Services</a>
                                    <a class="nav-link" href="membership_read_list_view.php">Memberships</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminPersonel" aria-expanded="false" aria-controls="collapseAdminPersonel">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Personel
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseAdminPersonel" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="coach_profile_read_list_view.php">Coach Profile</a>
                                    <a class="nav-link" href="staff_read_list_view.php">Staff</a>
                                </nav>
                            </div>       
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminMessages" aria-expanded="false" aria-controls="collapseAdminMessages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Messages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseAdminMessages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="email_template_read_list_view.php">Email 
                                    Templates</a>
                                    <a class="nav-link" href="sms_template_read_list_view.php">SMS Templates</a>
                                </nav>
                            </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-3">