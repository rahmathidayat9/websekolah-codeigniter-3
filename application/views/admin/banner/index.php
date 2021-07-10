<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>    
<?php endif ?>
<div class="card">
  <div class="card-header">
    <a href="<?= base_url('admin/Banner/create') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus fa-fw"></i> 
      TAMBAH DATA
    </a>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive">
    <div class="row">
      <div class="col-md-5 float-right">
    </div>
    </div>  
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Img</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th>Handle</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>

        <?php $no=1; foreach ($banners as $row): ?>
          <tr>
        <th><?= $no++ ?></th>
        <td>
          <img src="<?= base_url('assets/img/banner/').$row['banner_image'] ?>" width="50">
        </td>
        <td><?= $row['banner_title'] ?></td>
        <td><?= $row['banner_subtitle'] ?></td>
        <td>
          <?php if ($row['is_active'] == 1): ?>
            <a href="<?= base_url('admin/Banner/handle/').$row['id_banner'] ?>" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm"><i class="fas fa-times fa-fw"></i> Nonaktifkan</a>
          <?php else: ?>
            <a href="<?= base_url('admin/Banner/handle/').$row['id_banner'] ?>" onclick="return confirm('Yakin?')" class="btn btn-primary btn-sm"><i class="fas fa-check fa-fw"></i> Aktifkan</a>
          <?php endif ?>
        </td>
        <td>
          <a href="<?= base_url('admin/Banner/edit/').$row['id_banner'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
          <a href="<?= base_url('admin/Banner/delete/').$row['id_banner'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')"><i class="fas fa-fw fa-ban"></i></a>
        </td>
      </tr>  

        <?php endforeach; ?>
      
      </tbody>
    </table>
    </div>
    <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Banner/truncate') ?>" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i> Kosongkan Data</a>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->