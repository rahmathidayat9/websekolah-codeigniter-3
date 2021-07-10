<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>    
<?php endif ?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Ubah Password</div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('admin/Change_Password/update') ?>">
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> 
                        UPDATE
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>   
</div>