<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li>
                    <div class="logo-box">
                        <a href="index.php" class="logo text-center">
                            <span class="logo-lg">
                                <img src="{{url('public/admin/images/logo-white.png')}}" alt="" height="18">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="{{url('public/admin/images/logo-sm.png')}}" alt="" height="24">
                            </span>
                        </a>
                    </div>
                </li>

                <li class="has-submenu float-right">
                    <a class="dropdown-toggle waves-effect mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="pro-user-name">
                            <i class="fab fa-vimeo"></i> Vipro <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <a href="settings.php" class="dropdown-item notify-item text-dark">
                            <i class="fe-user"></i>
                            <span>Settings</span>
                        </a>
                        <a href="items-details.php" class="dropdown-item notify-item text-dark">
                            <i class="fe-settings"></i>
                            <span>Items Master</span>
                        </a>
                        <a href="clients-details.php" class="dropdown-item notify-item text-dark">
                            <i class="fe-settings"></i>
                            <span>Client Master</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="index.php" class="dropdown-item notify-item text-dark">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>

                <li class="float-right">
                    <a href="index.php" class="mr-0">
                        <i class="fas fa-sign-out-alt "></i> Logout
                    </a>
                </li>

                <li class="float-right">
                    <a href="add-invoice.php" class="mr-0">
                        <i class=" fas fa-file-medical"></i> Add New Invoice 
                    </a>
                </li>

                <li class="float-right">
                    <a href="dashboard.php" class="mr-0">
                        <i class="fas fa-file-invoice"></i> Invoice Lists
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
