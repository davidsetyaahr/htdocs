<form action="<?php echo base_url()."tentor/update" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Tentor</label>
			<input type="text" class="form-control" name="kode_tentor" value="<?php echo $data[0]["kode_tentor"]?>" readonly>
		</div>
		<div class="col-lg-6">
			<label>Nama Tentor</label>
			<input type="text" class="form-control" name="nama_tentor" value="">
		</div>
		<div class="col-lg-6">
			<label>Pendidikan Terakhir</label>
			<input type="text" class="form-control" name="pendidikan_terakhir" value="">
		</div>
		<div class="col-lg-6">
			<label>No. Hp</label>
			<input type="number" class="form-control" name="no_hp" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
