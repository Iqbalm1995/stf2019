
	    <div class="container-fluid">

	    	<!-- Page Heading -->
	        <h1 class="h3 mb-2 text-gray-800">Data Pemesanan</h1>
	        <hr>
	        <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
	        <a class="btn btn-primary" href="<?php echo base_url('pemesanan/order'); ?>">Kembali</a>
	        
	        <div class="card shadow mb-4 mt-2">
	        	<div class="card-header py-3">
	            	<h6 class="m-0 font-weight-bold text-primary">Data Pemesanan</h6>
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
			              <strong>Perhatian <i class="glyphicon glyphicon-ok"></i></strong> Anda Belum Melakukan Pembayaran!
			            </div>

			            <form method="post" action="<?=base_url();?>/pemesanan/konfirmasiPembayaran" enctype="multipart/form-data">
			            	<input type="hidden" name="nomor_pesanan" value="<?=$nomor_pesanan;?>">
			            	<input type="hidden" name="id_pesanan" value="<?=$id_pesanan;?>">
			            	<div class="form-group">
		                        <label>Upload Bukti Pembayaran <small><i>*Jika sudah melakukan pembayaran silahkan upload bukti pembayaran</i></small></label>
		                        <input name="upload_file" type="file" class="form-control" required>
		                    </div>
		                    <hr>
		                    <div class="form-group">
		                    	<button type="submit" class="btn btn-success btn-block">Upload Bukti Pembayaran</button>
		                    </div>
			            </form>

	            	<?php }else{ ?>

	            		<table width="100%" class="table">
	            			<tr>
	            				<td width="50%">
	            					<img src="<?=base_url('upload_file/'. $gbr_bukti)?>" class="img-thumbnail" style="max-height: 500px; max-width: 500px" >
	            				</td>
	            				<td class="text-center">
	            					<h4 class="text-success">Pembayaran sudah dilakukan</h4>
	            				</td>
	            			</tr>
	            		</table>
		            	<hr>
		            	<h3>Penjadwalan Gantt Chart</h3>
		            	<a href="<?=base_url('pemesanan/gantt_view/'.$id_pesanan)?>" class="btn btn-info btn-block btn-lg"><i class="fa fa-calendar-alt"></i> Atur Gantt Chart</a>

	            	<?php } ?>

	            </div>
	        </div>

	    </div>
