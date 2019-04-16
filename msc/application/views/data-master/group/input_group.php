<form action="<?php echo base_url()."data-master/group/input-group" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Nama Group</label>
			<input type="text" class="form-control" name="nama_group" value="">
		</div>
		<div class="col-lg-6">
			<label>Koordinator</label>
			<select name="id_koordinator" class="form-control">
				<option value="">---Pilih Koordinator---</option>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
