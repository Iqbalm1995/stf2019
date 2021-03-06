
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
            <?php  $role = $this->session->userdata('nama_level'); ?>
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
                          <?php if ($role == 'Marketing') { ?>
                              <th>Jadwal Produksi</th>
                              <th>Jadwal Distribusi</th>
                          <?php }elseif ($role == 'Produksi') {  ?>
                              <th>Jadwal Produksi</th>
                          <?php }elseif ($role == 'Operasional') {  ?>
                              <th>Jadwal Distribusi</th>
                          <?php } ?>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $today = new DateTime(date('Y-m-d'));
                      
                      foreach($pemesanan as $r){ 
                      $date_order = new DateTime($r->tgl_pesan);
                      if (($date_order < $today) && ($r->nama_status_pesan == 'Menunggu') && ($r->nama_status_proses == 'Menunggu Pembayaran')) {
                        $expired_order = 'class="table-danger"';
                      }else{
                        $expired_order = '';
                      }
                    ?>
                      <tr <?= $expired_order ?>>
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
                          <?php if ($role == 'Marketing') { ?>
                              <td class="text-center"><small><strong><?=(!empty($r->jadwal_produksi) ? $r->jadwal_produksi : '-') ?></strong></small></td>
                              <td class="text-center"><small><strong><?=(!empty($r->jadwal_distribusi) ? $r->jadwal_distribusi : '-') ?></strong></small></td>
                          <?php }elseif ($role == 'Produksi' || $role == 'QC') {  ?>
                              <td class="text-center"><small><strong><?=(!empty($r->jadwal_produksi) ? $r->jadwal_produksi : '-') ?></strong></small></td>
                          <?php }elseif ($role == 'Operasional') {  ?>
                              <td class="text-center"><small><strong><?=(!empty($r->jadwal_distribusi) ? $r->jadwal_distribusi : '-') ?></strong></small></td>
                          <?php } ?>
                        <td class="text-center">
                          <?php
                            if ($role == 'Marketing') { ?>
                              <a href="<?= base_url('pemesanan/edit/'.$r->id_pesanan); ?>">[Konfirmasi]</a> 
                              <a href="#" onclick="hapusData(<?= $r->id_pesanan; ?>)">[Hapus]</a>
                              <!-- <a href="<?= base_url('pemesanan/hapus/'.$r->id_pesanan); ?>">[Hapus]</a> -->
                          <?php }elseif ($role == 'Ppc') { ?>
                              <a href="<?= base_url('pemesanan/pcc_edit/'.$r->id_pesanan); ?>">[Konfirmasi]</a>
                          <?php }elseif ($role == 'Produksi' || $role == 'QC') {  ?>
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

          function hapusData(id) {
            var r = confirm("Yakin akan hapus data ini");
            if (r == true) {
              location.replace("<?php echo base_url('pemesanan/hapus/')?>" + id )
            } else {
              alert("Data tidak jadi dihapus")
            }
          }

        </script>
        <!-- End Script Data Tabel -->
