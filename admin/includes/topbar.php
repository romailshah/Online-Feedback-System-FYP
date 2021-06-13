
<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                
                <a href="#" class="logo">
<!--                    <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small">-->
                    <img src="assets/images/logo.jpg" alt="" height="100" class="logo-large">
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0">
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Welcome</h5>
                            </div>
                            <a class="dropdown-item" href="?page=profile"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                        </div>
                    </li>
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="">
                        <a href="?page=dashboard"><i class="mdi mdi-home"></i>Home</a>
                    </li>


                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account-box"></i>Users</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><label for="" class="label ml-3">Students</label></li>
                                    <li><a href="?page=add_std">Add New Student</a></li>
                                    <li><a href="?page=all_std">All Students</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><label for="" class="label ml-3">Teachers</label></li>
                                    <li><a href="?page=add_teacher">Add New Teacher</a></li>
                                    <li><a href="?page=all_teacher">All Teachers</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><label for="" class="label ml-3">Assign Teachers</label></li>
                                    <li><a href="?page=assign_tech">Assign Teacher</a></li>
                                    <li><a href="?page=assign_all_tech">All Assigned Teacher</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><label for="" class="label ml-3">Admin</label></li>
                                    <li><a href="?page=add_admin">Add New Admin</a></li>
                                    <li><a href="?page=all_admin">All Admins</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-google-pages"></i>Programs</a>
                        <ul class="submenu megamenu">
                            <li>
                                  <ul>
                                  <li><a href="?page=add_class">Add New Program</a></li>
                                  <li><a href="?page=all_class">All Program</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>

                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="?page=add_survey"><i class="mdi mdi-account-card-details"></i>Test or Surveys</a>
                    </li>
                    <li class="has-submenu">
                        <a href="?page=assign_survey"><i class="mdi mdi-account-card-details"></i>Assign Surveys</a>
                    </li>


                    <li class="has-submenu">
                        <a href="?page=result"><i class="mdi mdi-account-card-details"></i>Results</a>
                    </li>


                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
<br><br>