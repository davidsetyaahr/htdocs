<form action="<?php echo base_url()."data-master/jenjang/update_jenjang" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>#</label>
			<input type="text" class="form-control" name="id_jenjang" readonly value="<?php echo $data[0]["id_jenjang"]?>">
		</div>
		<div class="col-lg-6">
			<label>Jenjang</label>
			<input type="text" class="form-control" name="nama_jenjang" value="<?php echo $data[0]["nama_jenjang"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>