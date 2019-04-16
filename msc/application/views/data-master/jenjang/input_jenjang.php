<form action="<?php echo base_url()."data-master/jenjang/input-jenjang" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Jenjang</label>
			<input type="text" class="form-control" name="jenjang" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
