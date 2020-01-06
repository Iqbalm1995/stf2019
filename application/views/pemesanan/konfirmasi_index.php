
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Data Konfirmasi Pemesanan</h1>
          <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Konfirmasi Pemesanan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>No Pembayaran</th>
                      <th>No Pemesanan</th>
                      <th width="20%">Bukti Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach($list as $li){ 
                        if ($li->bukti) {
                    ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $li->no_pembayaran ?></td>
                        <td><?= $li->nomor_pesanan ?></td>
                        <!-- <td class="text-right">Rp. <?=number_format($li->total_pembayaran, 0 , '' , '.' )?></td> -->
                        <td class="text-center">
                            <a href="<?= base_url('upload_file/' . $li->bukti) ?>" target="_blank">
                                <img width="50%" src="<?= base_url('upload_file/' . $li->bukti) ?>" alt="">
                        </td>
                        <td class="text-center">
                            <a onclick='return confirm("Yakin Ingin Verifikasi No Pembayaran <?= $li->no_pembayaran ?> ? ")' href="<?= base_url('pemesanan/verifikasiPembayaran/' . $li->id_pembayaran) ?>" class="btn btn-success">Verifikasi</a>
                        </td>
                      </tr>
                    <?php } } ?>

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
