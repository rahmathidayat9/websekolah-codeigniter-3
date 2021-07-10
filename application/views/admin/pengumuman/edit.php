<div class="row">
  <div class="col-lg">
    <div class="card">
    <form method="POST" action="<?= base_url('admin/Pengumuman/update/').$pengumuman['id_pengumuman'] ?>">
      <div class="card-header">
        <a href="<?= base_url('admin/Pengumuman') ?>" class="btn btn-danger btn-sm">
        <i class="fas fa-window-close fa-fw"></i> 
            BATALKAN
        </a>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="n">Judul Pengumuman</label>
          <input required="" id="n" placeholder="" name="pengumuman_nama" value="<?= $pengumuman['pengumuman_nama'] ?>" class="form-control"></input>
          <?= form_error('pengumuman_nama','<small class="text-danger">','</small>') ?>
        </div>
        <div class="form-group">
          <label>Deskripsi Pengumuman</label>
          <textarea required="" rows="" id="ckeditor" name="pengumuman_deskripsi" placeholder="Deskripsi Pengumuman" class="form-control"><?= $pengumuman['pengumuman_deskripsi'] ?></textarea>
          <?= form_error('pengumuman_deskripsi','<small class="text-danger">','</small>') ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger col-md-3"><i class="fa fa-paper-plane"></i> KIRIM</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>