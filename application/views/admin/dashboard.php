<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>    
<?php endif ?>
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count_data('tbl_user') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Artikel</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count_data('tbl_blog') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Agenda
                        </div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count_data('tbl_blog') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pengumuman</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count_data('tbl_pengumuman') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-info fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->

<div class="row mt-4">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">Log Activity</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Activity</th>
                        <th>User</th>
                        <th>Waktu</th>
                      </tr>
                      </thead>
                      <tbody>

                        <?php $no=1; foreach (get_all_log_activity() as $row): ?>
                          <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $row['log_activity_name'] ?></td>
                        <td><?= $row['log_activity_user'] ?></td>
                        <td>
                          <?= $row['created_at'] ?>
                        </td>
                      </tr>  

                        <?php endforeach; ?>
                      
                      </tbody>
                    </table>
                    <hr>
                    <a href="<?= base_url('admin/Dashboard/truncate_log_activity') ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-fw"></i> 
                    Bersihkan Log Activity</a>
                </div>
            </div>
        </div>
    </div>  
</div>