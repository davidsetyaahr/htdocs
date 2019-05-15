<form action="<?php echo base_url()."keuangan/cicilan/input_cicilan" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Cicilan</label>
			<input type="text" class="form-control" name="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Biaya/cicilan</label>
			<input type="number" class="form-control" name="" value="">
		</div>
		<div class="col-lg-6">
			<label>Kode Siswa</label>
			<input type="text" class="form-control" name="kode_siswa">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Jumlah Cicilan</label>
			<input type="number" class="form-control" name="" value="">
		</div>
		<div class="col-lg-6">
			<label>Nama Siswa</label>
			<input type="text" class="form-control" name="nama_siswa" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Total Biaya</label>
			<input type="number" class="form-control" name="" value="">
		</div>

		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
