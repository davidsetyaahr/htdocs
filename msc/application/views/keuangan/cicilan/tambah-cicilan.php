<form action="<?php echo base_url()."keuangan/cicilan/input_cicilan" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Siswa</label>
			<select id="kode_siswa" class="form-control" name="kode_siswa">
				<option value="">---Option---</option>
				<?php
				foreach($siswa as $s => $val) {
					echo '<option value="'.$val["kode_siswa"].'">'.$val["nama_siswa"].'</option>';
				}
				?>
			</select>
		</div>
		<div class="col-lg-6">
			<label>Tahun</label>
			<select name="tahun" id="tahun" class="form-control tahun">
			<?php 
				$start = date("Y")+1;
				$end = date("Y")-2;
				for($i=$start;$i>=$end;$i--){
					$s = $i==date("Y") ? "selected" : "";
					echo "<option $s>$i</option>";
				}
			?>
			</select>
		</div>
		<div class="col-lg-6">
		<br>
			<label for="">Cicilan Ke-</label>
			<input type="text" id="cicilan_ke" class="form-control" name="cicilan_ke" readonly>
		</div>
		<div class="col-lg-6">
		<br>
			<label>Nominal</label>
			<input type="number" class="form-control" name="nominal" readonly value="<?= $cicilan[0]["cicilan"]?>">
		</div>

		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
