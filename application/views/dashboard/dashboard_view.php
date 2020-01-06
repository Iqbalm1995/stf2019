
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
          <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Saftaferti SCM</h6>
            </div>
            <div class="card-body">
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('asset/');?>img/undraw_posting_photo.svg" alt="">
              </div>
              <p>Selamat datang Dashboard Website Saftaferti SCM</p>
              
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
