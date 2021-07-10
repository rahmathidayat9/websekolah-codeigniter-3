<div class="col-lg">
  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('admin/User') ?>" class="btn btn-danger btn-sm">
      <i class="fas fa-window-close fa-fw"></i> 
          BATALKAN
        </a>
    </div>
    <div class="card-body">
      <form method="POST" action="<?= base_url('admin/User/update/').$user['id_user'] ?>">
        <div class="form-group">
          <label for="username">Username</label>
          <input required="" type="text" name="username" value="<?= $user['username'] ?>" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="hidden" name="oldpassword" value="<?= $user['password'] ?>" id="oldpassword" class="form-control">
          <input type="password" name="newpassword" id="password" class="form-control">
          <small class="text-secondary">Kosongkan password jika tidak akan di ubah</small>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> 
            SIMPAN
          </button>
        </div>            
      </form>
    </div>
  </div>  
</div>