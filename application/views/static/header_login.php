<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Saftaferti SCM
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url();?>/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          SCM
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Saftaferti
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?php echo base_url('home');?>">
              <i class="now-ui-icons design_app"></i>
              <p>Home</p>
            </a>
          </li>
          <?php if($this->session->userdata('status_login') != "loginactive"){ ?>
          <li>
            <a href="<?=base_url();?>login/pelanggan">
              <i class="now-ui-icons location_map-big"></i>
              <p>Login</p>
            </a>
          </li>
          <?php }else{ ?>
          <li>
            <a href="<?php echo base_url('pemesanan/order');?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Data Pemesanan</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('pemesanan/tambah_order');?>">
              <i class="now-ui-icons ui-1_simple-add"></i>
              <p>Tambah Pemsanan</p>
            </a>
          </li>
          <?php } ?>
          <?php if($this->session->userdata('status_login') == "loginactive"){ ?>
          <li class="active-pro">
            <a href="<?php echo base_url('login/do_logout/');?>">
              <i class="now-ui-icons media-1_button-power"></i>
              <p>LOGOUT ( <?= $this->session->userdata('username') ?> )</p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>