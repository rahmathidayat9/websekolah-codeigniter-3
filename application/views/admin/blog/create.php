<div class="row">
  <div class="col-lg">
    <div class="card">
      <div class="card-header">
        <a href="<?= base_url('admin/Blog') ?>" class="btn btn-danger btn-sm">
        <i class="fas fa-window-close fa-fw"></i> 
            BATALKAN
        </a>
      </div>
      <div class="card-body">
        <form method="POST" action="<?= base_url('admin/Blog/store') ?>" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-8">
            <div class="form-group">
              <textarea required="" id="ckeditor" name="blog_isi" required></textarea>
            </div>
          </div>  
          <div class="col-lg-4">
            <div class="form-group">
              <label for="judul">Judul Blog</label>
              <input required="" name="blog_title" id="judul" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label for="author">Penulis / Author</label>
              <input required="" readonly="" name="blog_author" value="<?= user()->username ?>" id="author" class="form-control" placeholder="Penulis"></input> 
            </div>
            <div class="form-group">
              <label for="kategori">Kategori</label>
              <select name="blog_kategori_id" id="kategori" class="form-control">
              <?php foreach($kategori_blog as $kategori): ?>
                <option value="<?= $kategori['id_kategori_blog'] ?>"><?= $kategori['nama_kategori'] ?></option>
              <?php endforeach; ?>
              </select> 
            </div>
            <div class="form-group">
              <div class="custom-file mb-3">
                <input required type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Pilih gambar</label>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-paper-plane"></i> 
              KIRIM</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>