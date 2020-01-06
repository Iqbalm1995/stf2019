
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Data Pemesanan Anda</h1>
          <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
          <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url('pemesanan/tambah_order'); ?>">Order Pemesanan Baru</a>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Pemesanan Anda</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>Nama pelanggan</th>
                      <th>Ketagori</th>
                      <th>Nama Produk</th>
                      <th>Qty</th>
                      <th>Tanggal Pesan</th>
                      <th>Status Order</th>
                      <th>Status Proses</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach($pemesanan as $r){ 
                    ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><strong><?= $r->nama_pelanggan ?></strong></td>
                        <td><?= $r->nama_kategori ?></td>
                        <td><?= $r->nama_produk ?></td>
                        <td class="text-center"><?= $r->qty ?></td>
                        <td class="text-center"><small><?= $r->tgl_pesan ?></small></td>
                        <td class="text-center"><small><strong><?= $r->nama_status_pesan ?></strong></small></td>
                        <td class="text-center"><small><strong><?= $r->nama_status_proses ?></strong></small></td>
                        <td class="text-center">
                          <div class="btn-group btn-group-sm">
                            <a href="<?= base_url('pemesanan/detail_order/' . $r->id_pesanan) ?>" class="btn btn-primary">Detail Pemesanan</a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Script Data Tabel -->
        <script type="text/javascript">
          // Call the dataTables jQuery plugin
          $(document).ready(function() {
            $('#dataTable').DataTable();
          });
        </script>
        <!-- End Script Data Tabel -->
