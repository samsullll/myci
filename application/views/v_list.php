<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("_template/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("_template/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("_template/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">
		<?php //$this->load->view("_template/breadcrumb.php") ?>
			<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('crud/tambah') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Merk</th>
										<th>Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach ($tb_barang as $b): 
									?>
									<tr>
										<td width="20"><?php echo $no++ ?></td>
										<td width="50"><?php echo $b->Kode_barang ?></td>
										<td width="200"><?php echo $b->Nama_barang ?></td>
										<td width="150"><?php echo $b->Merk ?></td>
										<td width="250"><?php echo $b->Harga ?></td>
			      						<td>
											<a href="<?php echo site_url('crud/edit/'.$b->Kode_barang) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('crud/delete/'.$b->Kode_barang) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>


		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("_template/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("_template/scrolltop.php") ?>
<?php $this->load->view("_template/modal.php") ?>

<?php $this->load->view("_template/js.php") ?>

<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>
    
</body>
</html>
