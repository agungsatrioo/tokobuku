
<?php $this->load->view('admin/v_admin_header'); 
	if($type=='add') {
		$act = base_url("admin/buku_crud/");
		$form_header = 'Tambah Data Buku';
	} elseif($type=='edit') {
		$act = base_url("admin/buku_crud/".@$details->id_buku);
		$form_header = 'Sunting Data Buku';
	}
?>
	<div class="body">

		<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center"><?= $form_header ?></h1>
			<div class="col-lg-3">
				<a href="<?php echo base_url("admin/data_buku") ?>" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
			</div>
		</div>
			<form class="form-horizontal" action="<?php echo $act?>" method="POST">
				<div class="form-group">
					<label class="col-sm-2 control-label">Judul Buku</label>
					<div class="col-sm-10">
						<input type="text" name="judul" class="form-control" value="<?= @$details->judul ?>" required>
					</div>
				</div>	

				<div class="form-group">
					<label class="col-sm-2 control-label">No. ISBN</label>
					<div class="col-sm-10">
						<input type="text" name="noisbn" class="form-control" value="<?= @$details->noisbn ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Penulis</label>
					<div class="col-sm-10">
						<input type="text" name="penulis" class="form-control" value="<?= @$details->penulis ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Penerbit</label>
					<div class="col-sm-10">
						<input type="text" name="penerbit" class="form-control" value="<?= @$details->penerbit ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Tahun</label>
					<div class="col-sm-10">
						<input type="text" name="tahun" class="form-control" value="<?= @$details->tahun ?>" required>
					</div>
				</div>
								<div class="form-group">
					<label class="col-sm-2 control-label">Stok</label>
					<div class="col-sm-10">
						<input type="number" name="stok" class="form-control" value="<?= @$details->stok ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Harga Pokok</label>
					<div class="col-sm-10">
						<input type="number" name="harga_pokok" class="form-control" value="<?= @$details->harga_pokok ?>" required>
					</div>
				</div>
								<div class="form-group">
					<label class="col-sm-2 control-label">Harga Jual</label>
					<div class="col-sm-10">
						<input type="number" name="harga_jual" class="form-control" value="<?= @$details->harga_jual ?>" required>
					</div>
				</div>
								<div class="form-group">
					<label class="col-sm-2 control-label">PPn</label>
					<div class="col-sm-10">
						<input type="number" name="ppn" class="form-control" value="<?= @$details->ppn ?>" required>
					</div>
				</div>
								<div class="form-group">
					<label class="col-sm-2 control-label">Diskon</label>
					<div class="col-sm-10">
						<input type="number" name="diskon" class="form-control" value="<?= @$details->diskon ?>" required>
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