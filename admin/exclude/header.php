 <?php 
 if (session_status() == PHP_SESSION_NONE){ 
    session_start(); 
 }

  ?>
 <header class="topbar" data-navbarbg="skin5" >
            <nav class="navbar top-navbar navbar-expand-md navbar-dark" >
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)" ><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index" 
                    style="margin-top: 2rem!important; 
                    margin-left: 12px!important;
                    height: 10px!important;"
                    >
                       
                       <img src="assets/images/admin-hmg-logo.png" >
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>

               

                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                            </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">

                                             <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Event today</h5> 
                                                        <span class="mail-desc">Just a reminder that event</span> 
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Settings</h5> 
                                                        <span class="mail-desc">You can customize this template</span> 
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Pavan kumar</h5> 
                                                        <span class="mail-desc">Just see the my admin!</span> 
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->

                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Luanch Admin</h5> 
                                                        <span class="mail-desc">Just see the my new admin!</span> 
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                  


                        <li class="nav-item dropdown">
                        
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" onclick="menuToggleAccount();"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31" ></a>

                             <div class="menu_account_bar">
                                            
                                <h3>TYPE</h3>
                                                    
                                    <ul>
                                        <li><a href="my_profile"><i class="ti-settings m-r-5 m-l-5"></i>My Profile</a></li>
                                        <!-- <li><img src="images/user.png"><a href="#">Edit Profile</a></li> -->
                                        <!-- <li><img src="images/user.png"><a href="#">My Profile</a></li> -->
                                        <!-- <li><img src="images/edit.png"><a href="#">Edit Profile</a></li>
                                        <li><img src="images/mail.png"><a href="#">Inbox</a></li>
                                        <li><img src="images/settings.png"><a href="#">Settings</a></li>
                                        <li><img src="images/information.png"><a href="#">Help</a></li> -->
                                        <li><a href="admin_logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a></li>
                                    </ul>
                                            
                            </div>

                        </li>

        
                    </ul>


                </div>
            </nav>
        </header>
        <!-- End Topbar header -->

        <?php 
            if($_SESSION['type'] == 'admin'){
         ?>
       <!--=====  Start aside =====-->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">

                    <ul id="sidebarnav" class="p-t-30" >

                        <li class="sidebar-item" > <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index" aria-expanded="false" ><i class="mdi mdi-view-dashboard" ></i><span class="hide-menu">Home</span></a></li>

                       <!--  javascript:void(0) -->

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false" ><i class="mdi mdi-receipt"></i><span class="hide-menu">Members </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="members" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> List of members </span></a></li>
                                <!-- <li class="sidebar-item"><a href="add_member.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add member </span></a></li> -->

                               
                            </ul>
                        </li>

                           <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"  ><i class="mdi mdi-receipt"></i><span class="hide-menu">Plans </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="plans.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List of plans </span></a></li>
                                
                            </ul>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"  ><i class="mdi mdi-receipt"></i><span class="hide-menu">Packages </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="packages.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List of packages </span></a></li>
                               
                            </ul>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"  ><i class="mdi mdi-receipt"></i><span class="hide-menu">Trainors </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="trainors.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List of trainors </span></a></li>
                               
                            </ul>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false" ><i class="mdi mdi-receipt"></i><span class="hide-menu">Health Status </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="health_status.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List of Members</span></a></li>
                                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> # </span></a></li>
                            </ul>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false" ><i class="mdi mdi-receipt"></i><span class="hide-menu">Report </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> #</span></a></li>
                                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> # </span></a></li>
                            </ul>
                        </li>

                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <?php 
             } else {

                ?>
                    <!--=====  Start aside =====-->
                    <aside class="left-sidebar" data-sidebarbg="skin5">
                        <!-- Sidebar scroll-->
                        <div class="scroll-sidebar">
                            <!-- Sidebar navigation-->
                            <nav class="sidebar-nav">

                                <ul id="sidebarnav" class="p-t-30" >

                                    <li class="sidebar-item" > <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false" ><i class="mdi mdi-view-dashboard" ></i><span class="hide-menu">Dashboard</span></a></li>

                                  

                                     <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false" ><i class="mdi mdi-receipt"></i><span class="hide-menu">Health Status </span></a>
                                        <ul aria-expanded="false" class="collapse  first-level">
                                            <li class="sidebar-item"><a href="health_status.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">List of Members</span></a></li>
                                            <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> # </span></a></li>
                                        </ul>
                                    </li>

     
                                </ul>
                            </nav>
                            <!-- End Sidebar navigation -->
                        </div>
                        <!-- End Sidebar scroll-->
                    </aside>
                <?php
             }
         ?>
           
       
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->