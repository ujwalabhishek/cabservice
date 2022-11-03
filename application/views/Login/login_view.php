<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        Cab Management System - Login
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php print base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php print base_url(); ?>assets/css/paper-dashboard.css" rel="stylesheet" />
    <link href="<?php print base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
    <style>
        .lock-page .navbar .navbar-brand,
        .login-page .navbar .navbar-brand,
        .register-page .navbar .navbar-brand {
            color: #fff !important;
        }

        .lock-page .navbar .navbar-collapse .nav-item .nav-link,
        .login-page .navbar .navbar-collapse .nav-item .nav-link,
        .register-page .navbar .navbar-collapse .nav-item .nav-link {
            text-transform: capitalize;
            color: #fff !important;
        }

        .full-page.section-image {
            position: static;
        }

        .section-image {
            background-size: cover;
            background-position: 50%;
            position: relative;
            width: 100%;
        }

        .section-image:after {
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 100%;
            display: block;
            left: 0;
            top: 0;
            content: "";
            background-color: rgba(0, 0, 0, .7);
        }

        .card .card-header:not([data-background-color]) {
            background-color: transparent;
        }

        .card .card-header {
            padding: 15px 15px 0;
            border: 0;
        }

        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        .full-page>.content {
            padding-top: 21vh;
        }

        .full-page>.content,
        .full-page>.footer {
            position: relative;
            z-index: 4;
        }

        .wrapper .content {
            padding-bottom: 20vh;
        }
    </style>
</head>

<body class="login-page">
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="border-bottom: 1px solid transparent; margin-top: 25px;">
        <div class="container">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="javascript:;">Cab Management System</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <?php echo anchor('Users/register', '<i class="nc-icon nc-layout-11"></i>User Register', 'class="nav-link"'); ?>
                    </li>
                    <li class="nav-item ">
                        <?php echo anchor('Login/user', '<i class="nc-icon nc-layout-11"></i>User Login', 'class="nav-link"'); ?>
                    </li>
                    <li class="nav-item ">
                        <?php echo anchor('Login/driver', '<i class="nc-icon nc-layout-11"></i>Driver Login', 'class="nav-link"'); ?>
                    </li>

                    <li class="nav-item ">

                        <?php
                        if ($this->session->userdata('currently_logged_in')) {
                            echo anchor('Login/logout', '<i class="nc-icon nc-spaceship"></i>Logout', 'class="nav-link"');
                        } else {
                            echo anchor('Login', '<i class="nc-icon nc-tap-01"></i>Admin Login', 'class="nav-link"');
                        }

                        ?>

                    </li>
                    <li class="nav-item ">
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper wrapper-full-page ">
        <?php if ($this->session->flashdata('item')) { ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span><b> Success - </b> <?php echo $this->session->flashdata('item'); ?></span>
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
        <div class="full-page section-image" filter-color="black" style="background-image: url('<?php print base_url(); ?>assets/img/bg/fabio-mangione.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">

            <div class="content">
                <div class="container">
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <?php if ($this->session->flashdata('item')) { ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                                <span><b> Success - </b> <?php echo $this->session->flashdata('item'); ?></span>
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
                        <form method="post" action="<?php echo site_url('Login/validate_admin'); ?>" class="form">
                            <div class="card card-login">
                                <div class="card-header ">
                                    <div class="card-header ">
                                        <h3 class="header text-center">Admin Login</h3>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <?php echo validation_errors(); ?>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username..." name="username">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="nc-icon nc-key-25"></i>
                                            </span>
                                        </div>
                                        <input type="password" placeholder="Password" class="form-control" name="password">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked="">
                                                <span class="form-check-sign"></span>
                                                Remember
                                                <?php if ($this->session->userdata('currently_logged_in'))
                                                    // print_r($this->session->userdata); 
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <input type="submit" value="Login" class="btn btn-warning btn-round btn-block mb-3">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>



</body>

</html>