<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK DOSEN UIN MALANG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/ionicons/css/ionicons.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UIN</b>Malang</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SPK</b>Angka Kredit</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('img/work.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('img/work.png'); ?>" class="img-circle" alt="User Image">

                <p>
                  <small>SPK Angka Kredit</small>
                </p>
              </li>
              <!-- Menu Footer-->

              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('c_login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('img/logo.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">DOSEN</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Profil Dosen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('dosen/InputDosen') ?>"><i class="fa fa-circle-o"></i> Profil </a></li>
            <li><a href="<?php echo base_url('dosen/InputDosen/edit') ?>"><i class="fa fa-circle-o"></i> Edit Profil </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Reviewer</span>
          </a>
        </li>


     <!-- PUNYA DOSEN -->


        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Menu Dupak</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url('dosen/Pendidikan') ?>"><i class="fa fa-circle-o"></i>  Data Pendidikan</a></li>
            <li><a href="<?php echo base_url('dosen/Pengajaran') ?>"><i class="fa fa-circle-o"></i> Data Pengajaran</a></li>
            <li><a href="<?php echo base_url('dosen/Penelitian') ?>"><i class="fa fa-circle-o"></i> Data Penelitian</a></li>
            <li><a href="<?php echo base_url('dosen/Pengabdian') ?>"><i class="fa fa-circle-o"></i> Data Pengabdian</a></li>
            <li><a href="<?php echo base_url('dosen/Penunjang') ?>"><i class="fa fa-circle-o"></i> Data Penunjang</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>