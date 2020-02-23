<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PT. Safta Ferti - Mechanical Or Industrial Engineering | Bandung</title>
  <link rel="icon" type="image/png" href="<?php echo base_url();?>/frontend/img/favicon.png">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url();?>/frontend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/frontend/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>/frontend/css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url();?>" style="max-width: 600px;"><img src="<?php echo base_url();?>/frontend/img/logo-sm.png" style="width: 15%;"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php if($this->session->userdata('status_login') == "loginactive"){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('pemesanan/order');?>">Data Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('pemesanan/tambah_order');?>">Tambah Pemesanan</a>
          </li>
          <a class="btn btn-outline-info ml-2" href="<?php echo base_url('login/do_logout');?>">Logout</a>
          <?php }else{ ?>
          <a class="btn btn-outline-info mr-2 ml-2" href="<?php echo base_url('login/pelanggan');?>">Login</a>
          <a class="btn btn-primary" href="<?php echo base_url('login/daftar');?>">Daftar</a>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>