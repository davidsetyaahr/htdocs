<form action="<?php echo base_url()."data-master/biaya/update_biaya" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>SPP</label>
			<input type="number" class="form-control" name="spp" value="<?php echo $data[0]["spp"]?>">
		</div>
		<div class="col-lg-6">
			<label>Cicilan</label>
			<input type="number" class="form-control" name="cicilan" value="<?php echo $data[0]["cicilan"]?>">
		</div>
		<div class="col-lg-6">
			<label>Pendaftaran</label>
			<input type="number" class="form-control" name="pendaftaran" value="<?php echo $data[0]["pendaftaran"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>