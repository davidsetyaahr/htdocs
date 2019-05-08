<form action="<?php echo base_url()."data-master/mapel/update" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Id Mapel</label>
			<input type="text" class="form-control" name="id_mapel" value="<?php echo $data[0]["id_mapel"]?>" readonly>
		</div>
		<div class="col-lg-6">
			<label>Nama Mapel</label>
			<input type="text" class="form-control" name="mata_pelajaran" value="<?php echo $data[0]["mata_pelajaran"]?>">
		</div>
		<div class="col-lg-6">
			<label>Jenjang</label>
			<select name="jenjang" class="form-control">
			<?php
				$sd = ($data[0]["jenjang"] == "SD") ? "selected" : "";
				$smp = ($data[0]["jenjang"] == "SMP") ? "selected" : "";
				$sma = ($data[0]["jenjang"] == "SMA") ? "selected" : "";
			?>
			<option value=""> ---Pilih Jenjang---</option>
				<option <?php echo $sd ?> >SD</option>
				<option <?php echo $smp ?> >SMP</option>
				<option <?php echo $sma ?> >SMA</option>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
