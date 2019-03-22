
<?php $this->load->view('admin/v_admin_header'); 
	if($type=='add') {
		$act = base_url("admin/kasir_crud/");
		$form_header = 'Tambah Data Kasir';
	} elseif($type=='edit') {
		$act = base_url("admin/kasir_crud/".@$details->id_kasir);
		$form_header = 'Sunting Data Kasir';
	}
?>
	<div class="body">

		<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center"><?= $form_header ?></h1>
			<div class="col-lg-3">
				<a href="<?php echo base_url("admin/data_kasir") ?>" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
			</div>
		</div>
			<form class="form-horizontal" action="<?php echo $act?>" method="POST">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="nama" class="form-control" value="<?= @$details->nama ?>" required>
					</div>
				</div>	

				<div class="form-group">
					<label class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<textarea name="alamat" class="form-control" required><?= @$details->alamat ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Telepon</label>
					<div class="col-sm-10">
						<input type="text" name="telepon" class="form-control" value="<?= @$details->telepon ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Status</label>
					<div class="col-sm-10">
						<input type="text" name="status" class="form-control" value="<?= @$details->status ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Pengguna</label>
					<div class="col-sm-10">
						<input type="text" name="username" class="form-control" value="<?= @$details->username ?>" required>
					</div>
				</div>
								<div class="form-group">
					<label class="col-sm-2 control-label">Kata Sandi</label>
					<div class="col-sm-10">
						<input type="password" name="password" class="form-control" value="<?= @$details->password ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Hak Akses</label>
					<div class="col-sm-10">
						<input type="number" name="akses" class="form-control" value="<?= @$details->akses ?>" required>
					</div>
				</div>
				
		<div class="form-group">
		<label class="col-sm-2 control-label"></label>
			<div class="col-sm-4">
			<?php if ($type == "add") { ?>
				<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
			<?php } else if($type == "edit"){ ?>
				<button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</button>
			<?php }?>
			</div>
		</div>
	</div>
</form>
</div>

</div>