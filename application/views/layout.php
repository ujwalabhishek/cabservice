<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php print base_url(); ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php print base_url(); ?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Cab Management System - <?php echo $page_title; ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php print base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php print base_url(); ?>assets/css/paper-dashboard2.min.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php print base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php print base_url(); ?>assets/img/logo-small.png">
          </div>

          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          <?php echo $this->session->userdata('username'); ?>
        </a>
      </div>
      <div class="sidebar-wrapper">

        <?php if ($this->session->userdata('role') == "admin") { ?>
          <!-- Start Admin Navigation -->
          <ul class="nav">
            <li class="active ">
              <?php echo anchor('Welcome', '<i class="nc-icon nc-bank"></i>Admin Dashboard', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Car', '<i class="nc-icon nc-delivery-fast"></i>View Cars', 'class="nav-link"'); ?>
            </li>

            <li>
              <?php echo anchor('Car/add', '<i class="nc-icon nc-simple-add"></i>Add Cars', 'class="nav-link"'); ?>
            </li>

            <li>
              <?php echo anchor('Drivers', '<i class="nc-icon nc-bus-front-12"></i>View Drivers', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Drivers/add', '<i class="nc-icon nc-simple-add"></i>Add Drivers', 'class="nav-link"'); ?>
            </li>
            <li>
            <li>
              <?php echo anchor('Users', '<i class="nc-icon nc-single-02"></i>View Users', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Users/add', '<i class="nc-icon nc-simple-add"></i>Add Users', 'class="nav-link"'); ?>
            </li>
            <li class="active-pro">
              <?php
              if ($this->session->userdata('currently_logged_in')) {
                echo anchor('Login/logout', '<i class="nc-icon nc-spaceship"></i>Logout', 'class="nav-link"');
              } else {
                echo anchor('Login', '<i class="nc-icon nc-spaceship"></i>Admin Login', 'class="nav-link"');
              }
              ?>
            </li>
          </ul>
          <!-- End Admin Navigation -->
        <?php } elseif ($this->session->userdata('role') == "user") { ?>
          <!-- Start User Navigation -->
          <ul class="nav">
            <li class="active ">
              <?php echo anchor('Users/dashboard', '<i class="nc-icon nc-bank"></i>User Dashboard', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Users/details/' . $this->session->userdata('userid'), '<i class="nc-icon nc-single-02"></i>My Profile', 'class="nav-link"'); ?>
            </li>

            <li>
              <?php echo anchor('Users/bookcabs/', '<i class="nc-icon nc-bus-front-12"></i>Book Cab', 'class="nav-link"'); ?>
            </li>

            <li>
              <?php echo anchor('Trip/mytrips', '<i class="nc-icon nc-delivery-fast"></i>My Trips', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Trip/payments', '<i class="nc-icon nc-money-coins"></i>Trip Payments', 'class="nav-link"'); ?>
            </li>
            <li>
            
            <li class="active-pro">
              <?php
              if ($this->session->userdata('currently_logged_in')) {
                echo anchor('Login/logout', '<i class="nc-icon nc-spaceship"></i>Logout', 'class="nav-link"');
              } else {
                echo anchor('Login', '<i class="nc-icon nc-spaceship"></i>Admin Login', 'class="nav-link"');
              }
              ?>
            </li>
          </ul>
          <!-- End User Navigation -->
        <?php } else { ?>
          <!-- Start Driver Navigation -->
          <ul class="nav">
            <li class="active ">
              <?php echo anchor('Welcome', '<i class="nc-icon nc-bank"></i>Driver Dashboard', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Users/details/' . $this->session->userdata('userid'), '<i class="nc-icon nc-single-02"></i>My Driver Profile', 'class="nav-link"'); ?>
            </li>

            <li>
              <?php echo anchor('Drivers/trips', '<i class="nc-icon nc-delivery-fast"></i>My Trips', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Drivers/trips/#activetrips', '<i class="nc-icon nc-money-coins"></i>Active Trips', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Drivers/trips/#pendingtrips', '<i class="nc-icon nc-money-coins"></i>Pending Trips', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Drivers/trips/#upcomingtrips', '<i class="nc-icon nc-money-coins"></i>Upcoming Trips', 'class="nav-link"'); ?>
            </li>
            <li>
              <?php echo anchor('Drivers/trips/#completedtrips', '<i class="nc-icon nc-money-coins"></i>Completed Trip', 'class="nav-link"'); ?>
            </li>
            <li class="active-pro">
              <?php
              if ($this->session->userdata('currently_logged_in')) {
                echo anchor('Login/logout', '<i class="nc-icon nc-spaceship"></i>Logout', 'class="nav-link"');
              } else {
                echo anchor('Login', '<i class="nc-icon nc-spaceship"></i>Admin Login', 'class="nav-link"');
              }
              ?>
            </li>
          </ul>
          <!-- End Driver Navigation -->
        <?php } ?>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Cab Management Service - <?php echo $page_title; ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <!-- main content goes here -->
        <?php if ($this->session->flashdata('success')) { ?>
          <div class="alert alert-success alert-dismissible fade show">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span><b> Success - </b> <?php echo $this->session->flashdata('success'); ?></span>
          </div>
        <?php } ?>

        <?php if ($this->session->flashdata('error')) { ?>
          <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span><b> Error - </b> <?php echo $this->session->flashdata('error'); ?></span>
          </div>
        <?php } ?>

        <?php $this->load->view($main_content); ?>
        <!-- main content goes here -->
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php print base_url(); ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/core/popper.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/moment.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/bootstrap-switch.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/sweetalert2.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/bootstrap-selectpicker.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/bootstrap-datetimepicker.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/bootstrap-tagsinput.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/jasny-bootstrap.min.js"></script>
  <script src="<?php print base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php print base_url(); ?>assets/js/plugins/fullcalendar/daygrid.min.js"></script>
<script src="<?php print base_url(); ?>assets/js/plugins/fullcalendar/timegrid.min.js"></script>
<script src="<?php print base_url(); ?>assets/js/plugins/fullcalendar/interaction.min.js"></script>

<script src="<?php print base_url(); ?>assets/js/plugins/jquery-jvectormap.js"></script>

<script src="<?php print base_url(); ?>assets/js/plugins/nouislider.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chart JS -->
  <script src="<?php print base_url(); ?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php print base_url(); ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php print base_url(); ?>assets/js/paper-dashboard2.min.js?v=2.1.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php print base_url(); ?>assets/demo/demo.js"></script>
  
  <script>
    $(document).ready(function() {
      demo.initDateTimePicker();
      // Javascript method's body can be found in assets<?php print base_url(); ?>/assets-for-demo/js/demo.js
       demo.initChartsPages();
      // demo.initFullCalendar();
      
    });
  </script>
</body>

</html>