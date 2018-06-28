<?php

// START SESSION
session_start();

// INITIAL INCLUDE FILES
include 'login-check.php';
include 'link.php';

$username = $_SESSION["user_name"];
$position = $_SESSION["position"];
$avatar = $_SESSION["avatar"];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/dropzone.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    
        <script src="https://cdn.jsdelivr.net/npm/jquery-tabledit@1.0.0/jquery.tabledit.min.js"></script>

        <script src="js/dropzone.js"></script>

  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">

          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div><!-- search-box -->

          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">

              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.php" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Our </span><strong>Stocker</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div><!-- navbar-header -->

              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages                        -->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                  </ul>
                </li>
                <!-- Logout    -->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div><!-- navbar-holder -->
          </div><!-- container-fluid -->
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar mr-3">
              <? if (!empty($avatar)) { ?>
            <img src="img/<?php echo $avatar ; ?>" alt="..." class="img-fluid rounded-circle"></div>
              <? } else { ?>
            <img src="img/no-avatar.jpg" alt="..." class="img-fluid rounded-circle"></div>
              <? } ?>
            <div class="title text-center">
              <h1 class="h4"><?php echo $username ; ?></h1>
              <p><?php echo $position ; ?></p>
            </div><!-- title -->
          </div><!-- sidebar-header -->
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                    <li class="active"><a href="index.php"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="#settingsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Settings </a>
                      <ul id="settingsDropdown" class="collapse list-unstyled ">
                    <li><a href="#"> <i class="icon-home"></i>Categories </a></li>
                    <li><a href="#"> <i class="icon-home"></i>Locations </a></li>
                    <li><a href="#"> <i class="icon-home"></i>Contacts </a></li>
                      </ul>
                    </li>
          </ul>

          <span class="heading">LincsMaC</span>
          <ul class="list-unstyled">
                    <li><a href="#lincsmacCaravansDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Caravans </a>
                      <ul id="lincsmacCaravansDropdown" class="collapse list-unstyled ">
                    <li><a href="#"> <i class="icon-home"></i>List Caravans </a></li>
                    <li><a href="#"> <i class="icon-home"></i>Add New </a></li>
                      </ul>
                    </li>
                    <li><a href="#lincsmacCustomersDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Customers </a>
                      <ul id="lincsmacCustomersDropdown" class="collapse list-unstyled ">
                    <li><a href="#"> <i class="icon-home"></i>List Customers </a></li>
                    <li><a href="#"> <i class="icon-home"></i>Add New </a></li>
                      </ul>
                    </li>
          </ul>

          <span class="heading">Stocker</span>
          <ul class="list-unstyled">
                    <li><a href="#productsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Products </a>
                      <ul id="productsDropdown" class="collapse list-unstyled ">
                    <li><a href="prod-list.php"> <i class="icon-home"></i>List Products </a></li>
                    <li><a href="prod-add.php"> <i class="icon-home"></i>Add New </a></li>
                      </ul>
                    </li>
                    <li><a href="#jobsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Jobs </a>
                      <ul id="jobsDropdown" class="collapse list-unstyled ">
                    <li><a href="job-list.php"> <i class="icon-home"></i>List Jobs </a></li>
                    <li><a href="job-add.php"> <i class="icon-home"></i>Add New </a></li>
                      </ul>
                    </li>
          </ul>

          <span class="heading">Cloud Storage</span>
          <ul class="list-unstyled">
                    <li><a href="#cloudDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Products </a>
                      <ul id="cloudDropdown" class="collapse list-unstyled ">
                    <li><a href="prod-list.php"> <i class="icon-home"></i>List Products </a></li>
                    <li><a href="prod-add.php"> <i class="icon-home"></i>Add New </a></li>
                      </ul>
                    </li>
          </ul>
        </nav>
        <!-- Main Content Area -->
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?= $title ?></h2>
            </div><!-- container-fluid -->
          </header>