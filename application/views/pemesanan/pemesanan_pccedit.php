
	    <div class="container-fluid">

	    	<!-- Page Heading -->
	        <h1 class="h3 mb-2 text-gray-800">Form Pemesanan</h1>
	        <hr>
	        <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
	        <a class="btn btn-primary" href="<?php echo base_url('pemesanan/'); ?>">Kembali</a>
	        
	        <div class="card shadow mb-4 mt-2">
	        	<div class="card-header py-3">
	            	<h6 class="m-0 font-weight-bold text-primary">Form Pemesanan</h6>
	            </div>
	            <div class="offset-md-2 col-md-8 offset-md-2 card-body">
	            	<table width="100%">
	            		<tr>
	            			<td width="30%">Nama Pemesan</td>
	            			<td>: <?=$nama_pelanggan;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Kategori Pemesan</td>
	            			<td>: <?=$nama_kategori;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Alamat</td>
	            			<td>: <?=$alamat;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">No Hp</td>
	            			<td>: <?=$no_hp;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">No Pesanan</td>
	            			<td>: <?=$nomor_pesanan;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Produk Pemesan</td>
	            			<td>: <?=$nama_produk;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Qty</td>
	            			<td>: <?=$qty;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Tanggal Pesan</td>
	            			<td>: <?=$tgl_pesan;?></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Status Order</td>
	            			<td>: <strong><?=$nama_status_pesan;?></strong></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Status Proses</td>
	            			<td>: <strong><?=$nama_status_proses;?></strong></td>
	            		</tr>
	            	</table>
	            	<hr>
	            	<h3>Keterangan Proses Pesanan</h3>
	            	<table width="100%">
	            		<tr>
	            			<td width="30%">Estimasi Bahan Baku</td>
	            			<td>: <strong><?=(!empty($hitung_waktu) ? $hitung_waktu." Hari" : '(Belum Ada Estimasi Waktu)') ?></strong></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Lama Welding</td>
	            			<td>: <strong><?=(!empty($lama_whelding) ? $lama_whelding." Hari" : '(Belum Ada Estimasi Waktu)') ?></strong></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Lama Machining</td>
	            			<td>: <strong><?=(!empty($lama_mashining) ? $lama_mashining." Hari" : '(Belum Ada Estimasi Waktu)') ?></strong></td>
	            		</tr>
	            		<tr>
	            			<td colspan="2" class="text-right pt-4">
	            				<h4><strong>Biaya Estimasi</strong> : Rp. <?=(!empty($total_pembayaran) ? number_format($total_pembayaran, 0 , '' , '.' )." .00" : '-') ?></h4>
	            			</td>
	            		</tr>
	            	</table>
	            	<hr>
	            	<h3>Konfirmasi Pembayaran</h3>
	            	<?php 
	            		$cekPembayaran = $this->pemesanan->getPembayaran($nomor_pesanan);
	            		$gbr_bukti = $cekPembayaran->bukti;;

	            		if ($cekPembayaran->status == 1 && $cekPembayaran->bukti == null) { ?>

		            	<div class="alert alert-warning" role="alert">
			              <strong>Perhatian <i class="glyphicon glyphicon-ok"></i></strong> Pelanggan Belum Melakukan Pembayaran!
			            </div>
	            	<?php }else{ ?>
	            		<table width="100%" class="table">
	            			<tr>
	            				<td width="50%">
	            					<img src="<?=base_url('upload_file/'. $gbr_bukti)?>" style="max-height: 500px; max-width: 500px" >
	            				</td>
	            				<td>
	            					<h4 class="text-success">Pembayaran sudah dilakukan</h4>
	            				</td>
	            			</tr>
	            		</table>
	            	<?php } ?>
	            	<hr>
	            	<h3>Verifikasi Pesanan</h3>
	            	<form action="<?=$action;?>"  method="post" enctype="multipart/form-data">
					  	<input type="hidden" name="id_pesanan" value="<?=$id_pesanan;?>">

	                    <div class="form-group">
	                    	<label><i><b>Estimasi Bahan Baku</b></i></label>
		                    <div class="input-group mb-3">
							  <input type="number" name="hitung_waktu" class="form-control" placeholder="Lama Estimasi Bahan Baku" value="<?=($hitung_waktu ? $hitung_waktu : '') ?>">
							  <div class="input-group-append">
							    <span class="input-group-text" id="basic-addon2">Hari</span>
							  </div>
							</div>
						</div>
	                    <div class="form-group">
	                    	<label><i><b>Total Pembayaran</b></i></label>
		                    <div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text">Rp.</span>
							  </div>
							  <input type="text" name="total_pembayaran" name="total_pembayaran" class="form-control" placeholder="Total Pembayaran" value="<?=(($total_pembayaran) ? $total_pembayaran : '') ?>">
							  <div class="input-group-append">
							    <span class="input-group-text">.00</span>
							  </div>
							</div>
						</div>

	                    <br>
					  	<button type="submit" class="btn btn-lg btn-success btn-block"><i class="fas fa-save"></i> Simpan Konfirmasi Pesanan</button>
					</form>
					<hr>
	            	<h3>Pengadaan Bahan Baku <?=$nama_produk;?>, Jumlah Order <?=$qty;?></h3>
	            	<table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
		                      <th width="5%">No.</th>
		                      <th>Nama Bahan Baku</th>
		                      <th>Jenis</th>
		                      <th>Qty x <?=$qty;?></th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                  	<?php 
		                  	  $list_bb = $this->pemesanan->tampil_bb($nama_produk);
		                      $no = 1;
		                      foreach($list_bb as $bb){ 
		                      $bb_qty = $bb->qty;
		                      $order_p = $qty;
		                      $total_bbQty = $bb_qty * $order_p;
		                    ?>
		                      <tr>
		                        <td class="text-center"><?= $no++ ?></td>
		                        <td><strong><?= $bb->nama_bb ?></strong></td>
		                        <td><?= $bb->jenis ?> (<?= $bb->qty ?>)</td>
		                        <td class="text-center"><?= $total_bbQty ?></td>
		                      </tr>
		                    <?php } ?>
		                  </tbody>
		            </table>
	            	<!-- <div id="btnbar" class="text-right pt-2 pb-2">
		            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalbb">
						  Tambah Bahan Baku
						</button>
	            	</div> -->
	            </div>
	        </div>

	    </div>

	    <!-- Script Data Tabel -->
        <script type="text/javascript">
          // Call the dataTables jQuery plugin
          $(document).ready(function() {
            $('#dataTable').DataTable( {
            	"dom": 'rt<"row"<"col-md-12"><"col-md-5"l><"col-md-7"p>>',
            });
          });
        </script>
        <!-- End Script Data Tabel -->
