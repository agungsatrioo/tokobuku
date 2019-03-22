
<?php $this->load->view('admin/v_admin_header'); 
	if($type=='add') {
		$act = base_url("admin/pasok_crud/");
		$form_header = 'Tambah Data Pasokan';
	} elseif($type=='edit') {
		$act = base_url("admin/pasok_crud/".@$details->id_pasok);
		$form_header = 'Sunting Data Pasokan';
	}
?>
	<div class="body">

		<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center"><?= $form_header ?></h1>
			<div class="col-lg-3">
				<a href="<?php echo base_url("admin/data_pemasok") ?>" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
			</div>
		</div>
			<form class="form-horizontal" action="<?php echo $act?>" method="POST">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nama Distributor</label>
					<div class="col-sm-10">
						<?php
						echo form_dropdown('id_distributor', @$distributor_options, @$details->id_distributor,array("class"=>"form-control"));
						?>
					</div>
				</div>	

				<div class="form-group">
					<label class="col-sm-2 control-label">Judul Buku</label>
					<div class="col-sm-10">
						<?php
						echo form_dropdown('id_buku', @$buku_options, @$details->id_buku,array("class"=>"form-control"));
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Jumlah</label>
					<div class="col-sm-10">
						<input type="text" name="jumlah" class="form-control" value="<?= @$details->jumlah ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Tanggal</label>
					<div class="col-sm-10">
						<input type="text" name="tanggal" class="form-control" value="<?= @$details->tanggal ?>" required>
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