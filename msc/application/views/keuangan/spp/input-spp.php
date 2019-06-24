<form action="<?php echo base_url()."keuangan/cicilan/input_cicilan" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Siswa</label>
			<select name="" id="" class="form-control" name="kode_siswa">
				<option value="">---Option---</option>
			</select>
		</div>
		<div class="col-lg-3">
			<label>Jumlah Bulan</label>
			<select name="tahun" id="" class="form-control">
			<?php 
				for($i=1;$i<=12;$i++){
					echo "<option>$i</option>";
				}
			?>
			</select>
		</div>
		<div class="col-lg-3">
			<label>Total</label>
			<input type="number" class="form-control" name="nominal" value="" readonly>
		</div>

		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
