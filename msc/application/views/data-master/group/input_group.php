<form action="<?php echo base_url()."data-master/group/insert_group" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Group</label>
			<input type="text" name="kode_group" class="form-control" value="">
		</div>
		<div class="col-lg-6">
			<label>Nama Group</label>
			<input type="text" class="form-control" name="nama_group" value="">
		</div>
		<div class="col-lg-6">
			<label>Koordinator</label>
			<select name="kode_tentor" class="form-control">
				<option value="">---Pilih Koordinator---</option>
				<?php foreach ($data as $d){?>
				<option value="<?php echo $d["kode_tentor"]?>"><?php echo $d["nama_tentor"]?></option>
				<?php }?>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
