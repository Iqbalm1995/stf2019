
      <div class="content">
        <div class="row">
          <div class="offset-md-2 col-md-8 offset-md-2">
            <div class="card">
              <div class="card-header">
                <h5 class="title text-center pt-4">Login Pelanggan</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="offset-md-2 col-md-8 offset-md-2">
                      <?=(($this->session->flashdata('pesan1')) ? $this->session->flashdata('pesan1') : '') ?>
                      <?=(($this->session->flashdata('pesan2')) ? $this->session->flashdata('pesan2') : '') ?>
                    </div>
                  </div>
                  <form class="user" method="post" action="<?=$action?>">
                  <div class="row">
                    <div class="offset-md-2 col-md-8 offset-md-2">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username"  placeholder="Masukan Username..." required>
                      </div>
                    </div>
                    <div class="offset-md-2 col-md-8 offset-md-2">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password..." required>
                      </div>
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="offset-md-2 col-md-8 offset-md-2">
                      <button type="submit" class="btn btn-lg btn-primary btn-block" style="border-radius: 50px;">
                        Login
                      </button>
                      <br>
                      <div class="text-center pb-2">
                        <a class="small" href="<?=base_url();?>login/daftar">Daftar Pelanggan Baru!</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>