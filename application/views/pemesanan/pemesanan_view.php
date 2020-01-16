
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Data Pemesanan</h1>
          <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
          <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url('pemesanan/tambah_data'); ?>">Tambah Data</a>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Pemesanan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>Nama pelanggan</th>
                      <th>Ketagori</th>
                      <th width="30%">Alamat</th>
                      <th>No Hp</th>
                      <th>Nama Produk</th>
                      <th>Qty</th>
                      <th>Tanggal Pesan</th>
                      <th>Status Order</th>
                      <th>Status Proses</th>
                      <th width="10%">Aksi</th>
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
                        <td><small><?= $r->alamat ?></small></td>
                        <td><?= $r->no_hp ?></td>
                        <td><?= $r->nama_produk ?></td>
                        <td class="text-center"><?= $r->qty ?></td>
                        <td class="text-center"><small><?= $r->tgl_pesan ?></small></td>
                        <td class="text-center"><small><strong><?= $r->nama_status_pesan ?></strong></small></td>
                        <td class="text-center"><small><strong><?= $r->nama_status_proses ?></strong></small></td>
                        <td class="text-center">
                          <?php 
                            $role = $this->session->userdata('nama_level');
                            if ($role == 'Marketing') { ?>
                              <a href="<?= base_url('pemesanan/edit/'.$r->id_pesanan); ?>">[Konfirmasi]</a> 
                              <a href="<?= base_url('pemesanan/hapus/'.$r->id_pesanan); ?>">[Hapus]</a>
                          <?php }elseif ($role == 'Ppc') { ?>
                              <a href="<?= base_url('pemesanan/pcc_edit/'.$r->id_pesanan); ?>">[Konfirmasi]</a>
                          <?php }elseif ($role == 'Produksi') {  ?>
                              <a href="<?= base_url('pemesanan/produksi_edit/'.$r->id_pesanan); ?>">[Konfirmasi]</a>
                          <?php }elseif ($role == 'Operasional') {  ?>
                              <a href="<?= base_url('pemesanan/operasional_edit/'.$r->id_pesanan); ?>">[Konfirmasi]</a>
                          <?php }else{
                            echo "-";
                          } ?>
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
