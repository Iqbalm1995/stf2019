      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title text-center pt-4">Data Pemesanan Anda</h5>
                <hr>
                <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
                  <div class="col-md-12">
                    <a class="btn btn-primary" href="<?php echo base_url('pemesanan/tambah_order'); ?>">Order Pemesanan Baru</a>
                  </div>
              </div>
              <div class="card-body m-4">
                <div class="row">
                  <div class="table-responsive">
                    <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="5%">No.</th>
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
                            <td class="text-center"><?= $no++ ?>.</td>
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
          </div>
        </div>
      </div>

        <!-- Script Data Tabel -->
        <script type="text/javascript">
          // Call the dataTables jQuery plugin
          $(document).ready(function() {
            $('#dataTable').DataTable();
          });
        </script>
        <!-- End Script Data Tabel -->
      