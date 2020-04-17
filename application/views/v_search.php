<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php echo form_open('crud/pencarian') ?>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="search_submit" value="Cari">
	<?php echo form_close() ?>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Merk</th>
			<th>Harga</th>
		</tr>
		<?php 
		foreach($tb_barang as $m){ 
		?>
		<tr>
			<td><?php echo $m->Kode_barang ?></td>
			<td><?php echo $m->Nama_barang ?></td>
			<td><?php echo $m->Merk ?></td>
			<td><?php echo $m->Harga ?></td>
		</tr>
		<?php } ?>
	</table>

</body>
</html>