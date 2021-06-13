
<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="index.html" class="logo">-->
                <!--Annex-->
                <!--</a>-->
                <!-- Image Logo -->
                <a href="index.html" class="logo">
                    <!--                    <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small">-->
                    <img src="admin/assets/images/logo.jpg" alt="" height="100" class="logo-large">
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0">
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="admin/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Welcome</h5>
                            </div>
                         <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?page=logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
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
                        <a href="?page=home"><i class="mdi mdi-home"></i>Home</a>
                    </li>
                    <?php
                    if(empty($_SESSION['teacher'])){
                    ?>
                    <li class="has-submenu">
                        <a href="?page=surveys"><i class="mdi mdi-account-card-details"></i>Test or Surveys</a>
                    </li>
                    <?php
                    }else{
                    ?>
                    <li class="has-submenu">
                        <a href="?page=teacher_survey_list"><i class="mdi mdi-account-card-details"></i>Survey List</a>
                    </li>
                    
                    <?php } ?>
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->

<br><br><br><br>
