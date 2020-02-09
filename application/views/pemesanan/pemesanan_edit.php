
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
	            			<td width="30%">Start</td>
	            			<td>: <strong><?=(!empty($start_pemesanan) ? $start_pemesanan : '(Belum ada estimasi tanggal oleh marketing)') ?></strong></td>
	            		</tr>
	            		<tr>
	            			<td width="30%">Delivery</td>
	            			<td>: <strong><?=(!empty($delivery_pemesanan) ? $delivery_pemesanan : '(Belum ada estimasi tanggal oleh marketing)') ?></strong></td>
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
					  	<?php  $status_pesan = $this->db->get('status_pesan')->result();
							  	$status_proses = $this->db->get('status_proses')->result(); ?>

	                    <div class="form-group">
	                        <label><i><b>Status Order</b></i></label>
	                        <select name="id_status_pesan" class="form-control" required>
	                            <optgroup label="PILIHAN">
	                            	<option value="">-Pilih-</option>
	                                <?php foreach ($status_pesan as $o) : ?>
	                                    <option value="<?php echo $o->id_status_pesan ?>" <?=(($o->id_status_pesan == $id_status_pesan) ? 'selected' : '') ?>><?= $o->nama_status_pesan ?></option>
	                                <?php endforeach ?>
	                            </optgroup>
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label><i><b>Start Pemesanan</b></i></label>
	                        <input type="text" class="form-control" data-date-format="yyyy-mm-dd" name="start_pemesanan" placeholder="YYYY-MM-DD" value="<?=$start_pemesanan;?>" required readonly>
	                    </div>

	                    <div class="form-group">
	                        <label><i><b>Delivery Pemesanan</b></i></label>
	                        <input type="text" class="form-control" data-date-format="yyyy-mm-dd" name="delivery_pemesanan" placeholder="YYYY-MM-DD" value="<?=$delivery_pemesanan;?>" required readonly>
	                    </div>

	                    <div class="form-group">
	                        <label><i><b>Status Proses</b></i></label> : 
	                        <?=$nama_status_proses;?>
		                </div>
	                    
	                    

	                    <br>
					  	<button type="submit" class="btn btn-lg btn-success btn-block"><i class="fas fa-save"></i> Simpan Verifikasi Pesanan</button>
					</form>
	            	<hr>
	            	<h3>Penjadwalan Gantt Chart</h3>
	            	<a href="<?=base_url('pemesanan/gantt/'.$nomor_pesanan)?>" class="btn btn-info btn-block btn-lg"><i class="fa fa-calendar-alt"></i> Atur Gantt Chart</a>
	            </div>
	        </div>

	    </div>
