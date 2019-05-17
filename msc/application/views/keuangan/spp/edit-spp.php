<form action="<?php echo base_url()."keuangan/spp/input_spp" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode SPP</label>
			<input type="number" class="form-control" name="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Nama Siswa</label>
			<input type="text" class="form-control" name="" value="">
		</div>
		<div class="col-lg-6">
		<label>Jenjang</label>
			<select name="id_jenjang" class="form-control">
			<option value=""> ---Pilih Jenjang---</option>
		</div>
		<div class="col-lg-6">
			<br>
			<label>Total Bayar</label>
			<input type="number" class="form-control" name="nama_siswa" value="">
		</div>
		<div class="col-lg-6">
			<label>Bulan</label>
			<select name="id_bulan" class="form-control">
			<option value=""> ---Pilih Bulan---</option>
		</div>
		<div class="col-lg-6">
			<br>
			<label>Keterangan</label>
			<input type="number" class="form-control" name="" value="">
		</div>
		
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
