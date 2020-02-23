<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PT. Safta Ferti - Mechanical Or Industrial Engineering | Bandung</title>
  <link rel="icon" type="image/png" href="<?php echo base_url();?>/frontend/img/favicon.png">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('asset/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('asset/');?>css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php if ($mode == 'Pelanggan') { ?>
<body style="background-image: url('<?php echo base_url();?>/frontend/img/52421.jpg'); background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */">
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top" style="bg-light{ opacity: 0.6; }">
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
<div class="pt-5 mt-5"></div>
<?php }else{ ?>
<body class="bg-gradient-info">
<?php } ?>

  <div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <?php if ($mode == 'Pelanggan') { ?>
                      <h1 class="h4 text-gray-900 mb-4">Welcome to <b>PT. Safta Ferti</b></h1>
                    <?php }else{ ?>
                      <h1 class="h4 text-gray-900 mb-4">Login <b><?=$mode?></b></h1>
                    <?php } ?>
                  </div>
                  <?=(($this->session->flashdata('pesan1')) ? $this->session->flashdata('pesan1') : '') ?>
                  <?=(($this->session->flashdata('pesan2')) ? $this->session->flashdata('pesan2') : '') ?>
                  <form class="user" method="post" action="<?=$action?>">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password..." required>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                      Login
                    </button>
                    <?php if ($mode == 'Pelanggan') { ?>
                    <hr>
                      <div class="text-center">
                        <a class="small" href="<?=base_url();?>login/daftar">Daftar Pelanggan Baru!</a>
                      </div>
                    <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php if ($mode == 'Pelanggan') { ?>
  <br><br><br>
  <footer class="footer bg-light">
    <div class="container pt-3 pb-3">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          
          <p class="text-muted small mb-4 mb-lg-0">&copy; PT. Safta Ferti 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <?php } ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('asset/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('asset/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('asset/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('asset/');?>js/sb-admin-2.min.js"></script>

</body>

</html>
