
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>
          <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
          <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url('pelanggan/tambah_data'); ?>">Tambah Data</a>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Pelanggan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat</th>
                      <th>No. HP</th>
                      <th>Username</th>
                      <th width="15%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach($pelanggan as $r){ 

                    ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $r->nama_pelanggan ?></td>
                        <td><?= $r->alamat ?></td>
                        <td><?= $r->no_hp ?></td>
                        <td><?= $r->username ?></td>
                        <td class="text-center">
                          <a href="<?= base_url('pelanggan/edit/'.$r->id_pelanggan); ?>">[Ubah]</a> 
                          <!-- <a href="<?= base_url('pelanggan/hapus/'.$r->id_pelanggan); ?>">[Hapus]</a> -->
                          <a href="#" onclick="hapusData(<?= $r->id_pelanggan; ?>)">[Hapus]</a>
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
              location.replace("<?php echo base_url('pelanggan/hapus/')?>" + id )
            } else {
              alert("Data tidak jadi dihapus")
            }
          }
        </script>
        <!-- End Script Data Tabel -->
