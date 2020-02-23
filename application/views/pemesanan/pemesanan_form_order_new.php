      <!-- Page Content -->
      <div class="container pt-5">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Form Order
        </h1>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#l">Home</a>
          </li>
          <li class="breadcrumb-item active">Tambah Pemesanan</li>
        </ol>


        <div class="row">
          <div class="col-md-12 pb-4">
            <div class="card">
              <div class="card-body m-4">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card card-outline-primary h-100">
                            <h3 class="card-header bg-primary text-white">Conveyor</h3>
                            <div class="card-body">
                                 <img src="<?php echo base_url();?>/frontend/img/52404.jpg" class="img-thumbnail" alt="Conveyor" style="height: 300px;">  
                            </div>

                            <form action="<?php echo base_url('pemesanan/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan;?>">
                                <input type="hidden" name="nama_produk" value="Conveyor">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                            <label>Kategori</label>
                                            <select name="id_kategori" class="form-control" required>
                                                <optgroup label="PILIHAN">
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <option value="<?php echo $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                                    <?php endforeach ?>
                                                </optgroup>
                                            </select>
                                    </li>
                                    <li class="list-group-item">
                                        <label>Qty</label>
                                        <input type="number" name="qty" onchange="minOrder(this.value)" placeholder="Qty" class="form-control" value="<?=$qty;?>" required>
                                    </li>
                                    <li class="list-group-item">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i> Kirim Pesanan</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card card-outline-success h-100">
                            <h3 class="card-header bg-success text-white">Fish Feeder</h3>
                            <div class="card-body text-center">
                                 <img src="<?php echo base_url();?>/frontend/img/52411.jpg" class="img-thumbnail" alt="Fish Feeder" style="height: 300px;">  
                            </div>
                            <form action="<?php echo base_url('pemesanan/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan;?>">
                                <input type="hidden" name="nama_produk" value="Fish Feeder">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                            <label>Kategori</label>
                                            <select name="id_kategori" class="form-control" required>
                                                <optgroup label="PILIHAN">
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <option value="<?php echo $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                                    <?php endforeach ?>
                                                </optgroup>
                                            </select>
                                    </li>
                                    <li class="list-group-item">
                                        <label>Qty</label>
                                        <input type="number" name="qty" onchange="minOrder(this.value)" placeholder="Qty" class="form-control" value="<?=$qty;?>" required>
                                    </li>
                                    <li class="list-group-item">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-paper-plane"></i> Kirim Pesanan</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div> 
                    <div class="col-lg-4 mb-4">
                        <div class="card card-outline-danger h-100">
                            <h3 class="card-header bg-danger text-white">Fish Feeder Mini</h3>
                            <div class="card-body">
                                 <img src="<?php echo base_url();?>/frontend/img/52410.jpg" class="img-thumbnail" alt="Fish Feeder Mini" style="height: 300px;"> 
                            </div>
                            <form action="<?php echo base_url('pemesanan/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan;?>">
                                <input type="hidden" name="nama_produk" value="Fish Feeder Mini">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                            <label>Kategori</label>
                                            <select name="id_kategori" class="form-control" required>
                                                <optgroup label="PILIHAN">
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <option value="<?php echo $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                                    <?php endforeach ?>
                                                </optgroup>
                                            </select>
                                    </li>
                                    <li class="list-group-item">
                                        <label>Qty</label>
                                        <input type="number" name="qty" onchange="minOrder(this.value)" placeholder="Qty" class="form-control" value="<?=$qty;?>" required>
                                    </li>
                                    <li class="list-group-item">
                                        <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-paper-plane"></i> Kirim Pesanan</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>       
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container -->
      <script type="text/javascript">
          
          function minOrder(param) {
              if (param <= 24) {
                alert("Minimal Pembelian Tidak Boleh Kurang dari 25");
              }
          }

      </script>
      