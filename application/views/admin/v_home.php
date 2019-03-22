
<?php $this->load->view('admin/v_admin_header'); 
	$title = "";
	switch($inpage) {
		case "data_buku":
		$title = "buku_form";
		break;
		case "data_distributor":
		$title = "distributor_form";
		break;
		case "data_pemasok":
		$title = "pemasok_form";
		break;
		case "data_transaksi":
		$title = "transaksi_form";
		break;
		case "data_kasir":
		$title = "kasir_form";
		break;
	}
?>
<link rel="stylesheet" href="<?php echo base_url("media")?>/custom-nav.css">
	<div class="body">

	<nav class="navbar nm navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="nm navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nm nav navbar-nav">
		  	<li class="<?php echo $inpage=='home'?'active':'' ?>"><a href="<?php echo base_url("admin")?>">Rumah</a></li>
			<li class="<?php echo $inpage=='data_buku'?'active':'' ?>"><a href="<?php echo base_url("admin/data_buku")?>">Data Buku</a></li>
			<li class="<?php echo $inpage=='data_transaksi'?'active':'' ?>"><a href="<?php echo base_url("admin/data_transaksi")?>">Data Transaksi</a></li>
			<li class="<?php echo $inpage=='data_distributor'?'active':'' ?>"><a href="<?php echo base_url("admin/data_distributor")?>">Data Distributor</a></li>
			<li class="<?php echo $inpage=='data_pemasok'?'active':'' ?>"><a href="<?php echo base_url("admin/data_pemasok")?>">Data Pemasok</a></li>
			<li class="<?php echo $inpage=='data_kasir'?'active':'' ?>"><a href="<?php echo base_url("admin/data_kasir")?>">Data Kasir</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
		<?php if (!empty($success)) { ?>
                         <div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4>Success!</h4>
							<p><?php echo $success ?></p>
						</div>
					<?php } ?>
                    <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4>Error has been occured!</h4>
						
						<p><?php echo $error ?></p>
						</div>
				<?php } ?>
		<?php if($inpage!='home') { ?>
			<a href='<?php echo base_url("admin/"). $title?>' class='btn btn-primary paded'>Tambah Data</a>
			<!--<a href='<?php echo base_url("admin/makereport/"). $inpage?>' class='btn btn-primary paded'>Buat Laporan</a>
		--><?php } ?>
		</div>

</div>
<?php $this->load->view($page); ?>
