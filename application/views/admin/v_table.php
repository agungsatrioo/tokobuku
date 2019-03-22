<?php
	$columns = array();
	switch($inpage) {
		case "data_buku":
		$columns = array("No","Judul Buku","ISBN","Penulis","Penerbit","Tahun","Stok","Harga Jual","PPn","Diskon");
		break;
		case "data_distributor":
		$columns = array("No","Nama Distributor","Alamat","Telepon");
		break;
		case "data_pemasok":
		$columns = array("No","Nama Pemasok","Nama Buku","Jumlah","Tanggal");
		break;
		case "data_transaksi":
		$columns = array("No","Nama Buku","Nama Kasir","Jumlah","Total","Tanggal");
		break;
		case "data_kasir":
		$columns = array("No","Nama","Alamat","Telepon","Status","Nama Pengguna","Hak Akses");
		break;
	}
?>
<div class="body">

<table id="tables" class="table table-striped table-hover" >
<thead>
	<tr>
		<?php
			foreach($columns as $o) {
				echo "<th>$o</th>";
			}
		?>
		<th>Tindakan</th>
	</tr>
</thead>
<tbody>
	<?php
		if(!empty($rows)) {
			foreach($rows as $o) {
				echo "<tr>";
				foreach ($o as $j) {
					echo "<td>$j</td>";
				}
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='10'><b class='text-center'>Sorry, no data</b></td></tr>";
		}
	?>
</tbody>
</table>
</div>