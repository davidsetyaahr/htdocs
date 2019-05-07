<form action="<?php echo base_url()."data-master/mapel/insert_mapel" ?>" method="post">
	<div class="row">
	<div class="col-lg-6">
			<label>Nama Mata Pelajaran</label>
			<input type="text" class="form-control" name="mata_pelajaran" value="">
		</div>
		<div class="col-lg-6">
<<<<<<< HEAD
			<label>Jenjang</label>
			<input type="text" class="form-control" name="jenjang" value="">
			<br>
=======
			<label>Jenjang Sekolah</label>
			<select name="id_jenjang" class="form-control">
				<option value="">---Pilih Jenjang---</option>
			</select>
>>>>>>> 8f18ad547679988bf3f17656e5c8d4fa27cb6117
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
