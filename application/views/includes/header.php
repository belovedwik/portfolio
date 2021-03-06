<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><? //echo $pageTitle; ?> Admin page </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <base href="<?= base_url()?>" />
      
    <!-- Bootstrap 3.3.4 -->
    <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?= base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?= base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url(); ?>css/Admin.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= base_url(); ?>css/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <script src="<?= base_url(); ?>js/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?=base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?= base_url(); ?>" target="_blank" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>My</b>AS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>MyAdmin</b>AS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown tasks-menu">
                    <span style="margin-top: 15px;display: block;"><?= lang('welcome'); ?></span>
                </li>
              <li class="dropdown tasks-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                    <img src="images/lang/<?= $this->session->userdata('lng') ?>.png"  style="width:25px"/>
                  </a>
                  <ul class="dropdown-menu pull-right" style="min-width: 78px;">
                    <li>
                      <a href="<?= base_url() . adminPath ?>/switch_lang/en/">
                        <img src="images/lang/en.png" style="width:25px"/>
                        <span>EN</span>
                      </a>
                    </li>
                    <li class="active">
                      <a href="<?= base_url() . adminPath ?>/switch_lang/ua/">
                        <img src="images/lang/ua.png" style="width:25px"/>
                        <span>UA</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url() . adminPath ?>/switch_lang/ru/">
                        <img src="images/lang/ru.png" style="width:25px"/>
                        <span>RU</span>
                      </a>
                    </li>
                  </ul>

              </li>
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-history"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($userinfo['last_login']) ? "First Time Login" : $userinfo['last_login']; ?></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url(); ?>images/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?= $userinfo['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <img src="<?= base_url(); ?>images/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <? // echo $name; ?> Name
                      <small><? // echo $role_text; ?> Role TXT</small>
                    </p>
                    
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?= base_url() . adminPath; ?>/profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><?= lang('navigation') ?></li>
            <li>
              <a href="<?= base_url() . adminPath; ?>">
                <i class="fa fa-dashboard"></i> 
                <span><?= lang('dashboard') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/about">
                <i class="fa fa-address-card-o"></i>
                <span><?= lang('about') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/services">
                <i class="fa fa-cubes"></i>
                <span><?= lang('services') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/projects">
                <i class="fa fa-briefcase"></i>
                <span><?= lang('projects') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/reviews">
                <i class="fa fa-grav"></i>
                <span><?= lang('reviews') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/news">
                <i class="fa fa-grav"></i>
                <span><?= lang('news') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/freelance">
                <i class="fa fa-credit-card"></i>
                <span><?= lang('freelance') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/contact">
                <i class="fa fa-user-o"></i>
                <span><?= lang('contact') ?></span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() . adminPath; ?>/users" >
                <i class="fa fa-users"></i>
                <span><?= lang('users') ?></span>
              </a>
            </li>
            <li class="treeview" style="display:none">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level One
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
            <?php
            if($userinfo['role_text'] == ROLE_ADMIN || $userinfo['role_text'] == ROLE_MANAGER)
            {
            ?>
            <li>
              <a href="#" >
                <i class="fa fa-thumb-tack"></i>
                <span>Task Status</span>
              </a>
            </li>
            <li>
              <a href="#" >
                <i class="fa fa-upload"></i>
                <span>Task Uploads</span>
              </a>
            </li>
            <?php
            }
            if($userinfo['role_text'] == ROLE_ADMIN)
            {
            ?>
            <li>
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li>
            <li>
              <a href="#" >
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
              </a>
            </li>
            <?php
            }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      
      </aside>
