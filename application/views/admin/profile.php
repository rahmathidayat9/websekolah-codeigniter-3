<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>    
<?php endif ?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Profil</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="" readonly="" name="" value="<?= user()->username ?>" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="" readonly="" name="" value="<?= user()->email ?>" id="" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Edit Profil</div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('admin/Profile/update') ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="" name="username" value="<?= user()->username ?>" id="username" class="form-control">
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