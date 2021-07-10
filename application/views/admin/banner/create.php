<div class="col-lg">
	<div class="card">
		<div class="card-header">
			<a href="<?= base_url('admin/Banner') ?>" class="btn btn-danger btn-sm">
			<i class="fas fa-window-close fa-fw"></i> 
		      BATALKAN
		    </a>
		</div>
		<div class="card-body">
			<form method="POST" action="<?= base_url('admin/Banner/store') ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label for="customFile">Gambar</label>
					<div class="custom-file">
		                <input required type="file" name="file" class="custom-file-input" id="customFile">
		                <label class="custom-file-label" for="customFile">Pilih gambar</label>
	              	</div>
              	</div>
				<div class="form-group">
					<label for="banner_title">Judul Banner</label>
					<input required="" type="" name="banner_title" id="banner_title" class="form-control" placeholder="example : SELAMAT DATANG DI SMK..">
				</div>
				<div class="form-group">
					<label for="banner_subtitle">Sub Judul (judul kecil)</label>
					<input required="" type="banner_subtitle" name="banner_subtitle" id="banner_subtitle" class="form-control" placeholder="example : SMK LUAR BIASA..">
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