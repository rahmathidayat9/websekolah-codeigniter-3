<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>    
<?php endif ?>
<div class="card">
  <div class="card-header">
    <a href="<?= base_url('admin/Agenda/create') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus fa-fw"></i> 
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
        <th>Nama Agenda</th>
        <th>Author</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>

        <?php $no=1; foreach ($agenda as $row): ?>
          <tr>
        <th><?= $no++ ?></th>
        <td><?= $row['agenda_nama'] ?></td>
        <td><?= $row['agenda_author'] ?></td>
        <td>
          <a href="<?= base_url('admin/Agenda/edit/').$row['id_agenda'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
          <a href="<?= base_url('admin/Agenda/delete/').$row['id_agenda'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')"><i class="fas fa-fw fa-ban"></i></a>
        </td>
      </tr>  

        <?php endforeach; ?>
      
      </tbody>
    </table>
    </div>
    <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Agenda/truncate') ?>" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i> Kosongkan Data</a>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->