
<?php $this->load->view('admin/v_admin_header'); 
	if($type=='add') {
		$act = base_url("admin/distributor_crud/");
		$form_header = 'Tambah Data Distributor';
	} elseif($type=='edit') {
		$act = base_url("admin/distributor_crud/".@$details->id_distributor);
		$form_header = 'Sunting Data Distributor';
	}
?>
	<div class="body">

		<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center"><?= $form_header ?></h1>
			<div class="col-lg-3">
				<a href="<?php echo base_url("admin/data_distributor") ?>" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
			</div>
		</div>
			<form class="form-horizontal" action="<?php echo $act?>" method="POST">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Distributor</label>
					<div class="col-sm-10">
						<input type="text" name="nama_distributor" class="form-control" value="<?= @$details->nama_distributor ?>" required>
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