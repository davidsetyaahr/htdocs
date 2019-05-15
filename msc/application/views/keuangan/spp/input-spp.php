<form action="<?php echo base_url()."keuangan/spp/insert_spp" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>SPP</label>
			<input type="text" class="form-control" name="spp" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
