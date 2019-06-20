<form action="<?php echo base_url()."keuangan/cicilan/input_cicilan" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Siswa</label>
			<select name="" id="" class="form-control" name="kode_siswa">
				<option value="">---Option---</option>
			</select>
		</div>
		<div class="col-lg-3">
			<label>Tahun</label>
			<select name="tahun" id="" class="form-control">
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
		<div class="col-lg-3">
			<label>Bulan</label>
			<select name="tahun" id="" class="form-control">
			<?php 
				for($i=1;$i<=12;$i++){
					$s = $i==(int)date("m") ? "selected" : "";
					echo "<option value='$i' $s>".$this->common_lib->indoMonth($i)."</option>";
				}
			?>
			</select>
		</div>
		<div class="col-lg-6">
		<br>
			<label for="">Cicilan Ke-</label>
			<input type="text" class="form-control" name="cicilan_ke" readonly>
		</div>
		<div class="col-lg-6">
		<br>
			<label>Nominal</label>
			<input type="number" class="form-control" name="nominal" value="" readonly>
		</div>

		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
