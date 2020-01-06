
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
	            	<form action="<?php echo base_url('pemesanan/proses_tambah'); ?>"  method="post" enctype="multipart/form-data">
					  	<input type="hidden" name="id_pesanan" value="<?=$id_pesanan;?>">

	                    <div class="form-group">
	                        <label><i><b>Pelanggan</b></i></label>
	                        <select name="id_pelanggan" class="form-control" required>
	                            <optgroup label="PILIHAN">
	                                <?php foreach ($pelanggan as $p) : ?>
	                                    <option value="<?php echo $p->id_pelanggan ?>"><?= $p->nama_pelanggan ?></option>
	                                <?php endforeach ?>
	                            </optgroup>
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label><i><b>Kategori</b></i></label>
	                        <select name="id_kategori" class="form-control" required>
	                            <optgroup label="PILIHAN">
	                                <?php foreach ($kategori as $k) : ?>
	                                    <option value="<?php echo $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
	                                <?php endforeach ?>
	                            </optgroup>
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label><i><b>Pesanan</b></i></label>
	                        <select name="nama_produk" class="form-control" required>
	                            <optgroup label="PILIHAN">
	                                <?php foreach ($produk as $p) : ?>
	                                    <option value="<?php echo $p->keterangan ?>"><?= $p->keterangan ?></option>
	                                <?php endforeach ?>
	                            </optgroup>
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label>Qty</label>
	                        <input type="number" name="qty" placeholder="qty" class="form-control" value="<?=$qty;?>">
	                    </div>
	                    <br>
					  	<button type="submit" class="btn btn-lg btn-success btn-block"><i class="fas fa-paper-plane"></i> Kirim Permintaan</button>
					</form>
	            </div>
	        </div>

	    </div>
