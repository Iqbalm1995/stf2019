
	    <div class="container-fluid">

	    	<!-- Page Heading -->
	        <h1 class="h3 mb-2 text-gray-800">Form Pelanggan</h1>
	        <hr>
	        <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
	        <a class="btn btn-primary" href="<?php echo base_url('user/'); ?>">Kembali</a>
	        
	        <div class="card shadow mb-4 mt-2">
	        	<div class="card-header py-3">
	            	<h6 class="m-0 font-weight-bold text-primary">Form Pelanggan</h6>
	            </div>
	            <div class="offset-md-2 col-md-8 offset-md-2 card-body">
	            	<form action="<?=$action;?>"  method="post" enctype="multipart/form-data">
					  	<input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan;?>">

						<div class="form-group">
	                        <label>Nama Pelanggan</label>
	                        <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" class="form-control" value="<?=$nama_pelanggan;?>">
	                    </div>
	                    
					  	<div class="form-group">
	                        <label>Alamat</label>
	                        <textarea name="alamat" class="form-control" placeholder="Alamat"><?=$alamat;?></textarea>
	                    </div>

	                    <div class="form-group">
	                        <label>No Hp</label>
	                        <input type="phone" name="no_hp" placeholder="No Hp" class="form-control" value="<?=$no_hp;?>">
	                    </div>

						<div class="form-group">
	                        <label>Username</label>
	                        <input type="text" name="username" placeholder="Username" class="form-control" value="<?=$username;?>">
	                    </div>

	                    <div class="form-group">
	                        <label>Password</label>
	                        <input type="password" name="password" placeholder="Password" class="form-control" value="<?=$password;?>">
	                    </div>

	                    <br>
					  	<button type="submit" class="btn btn-lg btn-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
					</form>
	            </div>
	        </div>

	    </div>
