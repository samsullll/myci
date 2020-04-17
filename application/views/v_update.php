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
				<?php $this->load->view("_template/breadcrumb.php") ?>
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('crud') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<?php foreach($tb_barang as $m){ ?>
						<form action="<?php echo base_url(). 'index.php/crud/update'; ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="Kode_barang">Kode Barang</label>
								<input class="form-control" type="text" name="Kode_barang" value="<?php echo $m->Kode_barang; ?>" readonly="true"/>
							</div>
							<div class="form-group">
								<label for="Nama_barang">Nama Barang</label>
								<input class="form-control" type="text" name="Nama_barang" value="<?php echo $m->Nama_barang; ?>" />
							</div>
							<div class="form-group">
								<label for="Merk">Merk</label>
								<input class="form-control" type="text" name="Merk" value="<?php echo $m->Merk; ?>" />
							</div>
							<div class="form-group">
								<label for="Harga">Harga</label>
								<input class="form-control" type="text" name="Harga" value="<?php echo $m->Harga; ?>" />
							</div>
          					<input class="btn btn-success" type="submit" name="btn" value="Update" />
						</form>
						<?php } ?>
					</div>
				<div class="card-footer small text-muted">
						* required fields
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
		<?php $this->load->view("_template/js.php") ?>
		<script type="text/javascript">
 		$(function(){
  			$(".datepicker").datepicker({
      		format: 'yyyy-mm-dd',
      		autoclose: true,
      		todayHighlight: true,
  			});
 		});
		</script>
</body>
</html>

