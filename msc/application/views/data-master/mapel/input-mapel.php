<form action="<?php echo base_url()."data-master/mapel/insert_mapel" ?>" method="post">
	<div class="row">
	<div class="col-lg-6">
			<label>Nama Mata Pelajaran</label>
			<input type="text" class="form-control" name="mata_pelajaran" value="">
		</div>
		<div class="col-lg-6">
			<label>Jenjang</label>
			<input type="text" class="form-control" name="jenjang" value="">
			<br>
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
