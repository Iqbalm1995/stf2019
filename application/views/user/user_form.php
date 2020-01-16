
	    <div class="container-fluid">

	    	<!-- Page Heading -->
	        <h1 class="h3 mb-2 text-gray-800">Form User</h1>
	        <hr>
	        <?php echo $this->session->userdata('message1') <> '' ? $this->session->userdata('message1') : ''; ?>
	        <a class="btn btn-primary" href="<?php echo base_url('user/'); ?>">Kembali</a>
	        
	        <div class="card shadow mb-4 mt-2">
	        	<div class="card-header py-3">
	            	<h6 class="m-0 font-weight-bold text-primary">Form User</h6>
	            </div>
	            <div class="offset-md-2 col-md-8 offset-md-2 card-body">
	            	<form action="<?=$action;?>"  method="post" enctype="multipart/form-data">
					  	<input type="hidden" name="id_user" value="<?=$id_user;?>">
						<div class="form-group">
	                        <label>Username</label>
	                        <input type="text" name="username" placeholder="Username" class="form-control" value="<?=$username;?>">
	                    </div>

	                    <div class="form-group">
	                        <label>Password</label>
	                        <input type="password" name="password" placeholder="Password" class="form-control" value="<?=$password;?>">
	                    </div>

	                    <div class="form-group">
	                        <label><i><b>Kategori</b></i></label>
	                        <select name="id_level" class="form-control" required>
	                            <optgroup label="PILIHAN">
	                                <option value="1">Marketing</option>
	                                <option value="2">PCC</option>
	                                <option value="3">Produksi</option>
	                                <option value="4">Administrator</option>
	                                <option value="5">Operasional</option>
	                            </optgroup>
	                        </select>
	                    </div>

	                    <br>
					  	<button type="submit" class="btn btn-lg btn-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
					</form>
	            </div>
	        </div>

	    </div>
