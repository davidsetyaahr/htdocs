<form action="<?php echo base_url()."data-master/mapel/input-mapel" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Nama Mapel</label>
			<input type="text" class="form-control" name="nama_mapel" value="">
		</div>
		<div class="col-lg-6">
			<label>Jenjang Sekolah</label>
			<select name="id_jenjang" class="form-control">
				<option value="">---Pilih Jenjang---</option>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
