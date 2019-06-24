<form action="<?php echo base_url()."keuangan/cicilan/insert_cicilan" ?>" method="post">
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
			<label>Kekurangan</label>
			<input type="number" class="form-control" id="kekurangan" name="kekurangan" value="" readonly>
		</div>
		<div class="col-lg-6">
		<br>
			<label>Nominal</label>
			<input type="number" class="form-control" id="nominal" name="nominal" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
