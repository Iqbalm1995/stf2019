
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Data Pemesanan Index</h1>
          <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
          <!-- <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url('pemesanan/tambah_data'); ?>">Tambah Data</a>
          </div> -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Pemesanan Index</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>Nama pelanggan</th>
                      <th>Ketagori</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                      <th>Nama Produk</th>
                      <th>Qty</th>
                      <th>Tanggal Pesan</th>
                      <th>Status Pesanan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach($pemesanan as $st){ 
                    ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $st->nama_pelanggan ?></td>
                        <td><?= $st->nama_kategori ?></td>
                        <td><?= $st->alamat ?></td>
                        <td><?= $st->no_hp ?></td>
                        <td><?= $st->nama_produk ?></td>
                        <td class="text-center"><?= $st->qty ?></td>
                        <td class="text-center"><?= $st->tgl_pesan ?></td>
                        <td class="text-center"><?= $st->nama_status_bayar ?></td>
                        <!-- <td class="text-right">Rp. <?=number_format($st->harga, 0 , '' , '.' )?></td> -->
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a href="<?= base_url('ganttchart/' . $st->id_pesanan) ?>" class="btn btn-primary">Ganttchart</a>
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
