<form action="<?php echo base_url()."data_siswa/update_siswa" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
		
		<?php
		foreach($edit as $s) {?>
			<label>Kode Siswa</label>
			<input type="text" class="form-control" name="kode_siswa" value="<?php echo $s{"kode_siswa"}?>" readonly>
		</div> 
		<div class="col-lg-6">
			<label>Nama Siswa</label>
			<input type="text" class="form-control" name="nama_siswa" value="<?php echo $s["nama_siswa"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Tanggal Lahir</label>
			<input type="date" class="form-control" name="tgl_lahir" value="<?php echo $s["tgl_lahir"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Jenis Kelamin</label>
			<select name="jk" class="form-control">
			<?php
				$l = ($s["jk"] == "Laki Laki") ? "selected" : "";
				$p = ($s["jk"] == "Perempuan") ? "selected" : "";
				?>
			<option value=""> ---Pilih Jenis Kelamin---</option>
				<option <?php echo $l ?> >Laki Laki</option>
				<option <?php echo $p ?> >Perempuan</option>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<label>Alamat</label>
			<textarea type="number" class="form-control" name="alamat"><?php echo $s["alamat"]?></textarea>
		</div>
		<div class="col-lg-6">
			<br>
			<label>No Telepon Siswa</label>
			<input type="number" class="form-control" name="no_hpsiswa" value="<?php echo $s["no_hp"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Kelas</label>
			<select name="kelas" class="form-control">
			<option value="">---Pilih Kelas---</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<label>Cicilan</label>
			<input type="number" class="form-control" name="cicilan" value="<?php echo $s["cicilan"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<label> Nama Group</label>
			<input type="text" class="form-control" name="nama_group" value="<?php echo $s["nama_group"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Nama Orang Tua</label>
			<input type="text" class="form-control" name="nama_ortu" value="<?php echo $s["nama_ortu"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<label>No Telepon Wali</label>
			<input type="number" class="form-control" name="no_hpwali" value="<?php echo $s["no_hp"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Tanggal Pendafatran</label>
			<input type="date" class="form-control" name="tgl_daftar" value="<?php echo $s["tgl_daftar"]?>">
		</div>

		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
			<?php }?>
	</div>
</form>

