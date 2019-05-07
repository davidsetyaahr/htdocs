<form action="<?php echo base_url()."tentor/update" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Tentor</label>
			<input type="text" class="form-control" name="kode_tentor" value="<?php echo $data[0]["kode_tentor"]?>" readonly>
		</div>
		<div class="col-lg-6">
			<label>Nama Tentor</label>
			<input type="text" class="form-control" name="nama_tentor" value="<?php echo $data[0]["nama_tentor"]?>">
		</div>
		<div class="col-lg-6">
			<label>Pendidikan Terakhir</label>
			<input type="text" class="form-control" name="pendidikan_terakhir" value="<?php echo $data[0]["pendidikan_terakhir"]?>">
		</div>
		<div class="col-lg-6">
			<label>No. Hp</label>
			<input type="number" class="form-control" name="no_hp" value="<?php echo $data[0]["no_hp"]?>">
		</div>
		<div class="col-lg-6">
<<<<<<< HEAD
=======
			<label>Jenis Kelamin</label>
			<select name="jk" class="form-control">
			<?php
				$l = ($data[0]["jk"] == "Laki Laki") ? "selected" : "";
				$p = ($data[0]["jk"] == "Perempuan") ? "selected" : "";
			?>
			<option value="">---Pilih Jenis Kelamin---</option>
				<option <?php echo $l ?> >Laki Laki</option>
				<option <?php echo $p ?> >Perempuan</option>
			</select>
		</div>
		<div class="col-lg-6">
			<label>Alamat</label>
			<textarea type="number" class="form-control" name="alamat" ><?php echo $data[0]["alamat"]?></textarea>
		</div>
		<div class="col-lg-6">
			<label>Gaji</label>
			<input type="number" class="form-control" name="gaji" value="<?php echo $data[0]["gaji"]?>">
		</div>
		<div class="col-lg-6">
>>>>>>> 8f18ad547679988bf3f17656e5c8d4fa27cb6117
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
