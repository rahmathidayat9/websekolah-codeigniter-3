<div class="col-lg">
	<div class="card">
		<div class="card-header">
			<a href="<?= base_url('admin/User') ?>" class="btn btn-danger btn-sm">
			<i class="fas fa-window-close fa-fw"></i> 
		      BATALKAN
		    </a>
		</div>
		<div class="card-body">
			<form method="POST" action="<?= base_url('admin/User/store') ?>">
				<div class="form-group">
					<label for="username">Username</label>
					<input required="" type="text" name="username" id="username" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input required="" type="email" name="email" id="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input required="" type="password" name="password" id="password" class="form-control">
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