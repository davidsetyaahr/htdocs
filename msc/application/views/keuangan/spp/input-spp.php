<form action="<?php echo base_url()."keuangan/spp/insert_spp" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Siswa</label>
			<select name="kode_siswa" id="kode_siswa" class="form-control" name="kode_siswa">
				<option value="">---Option---</option>
				<?php 
					foreach ($siswa as $data) {
						echo "<option value='$data[kode_siswa]'>$data[nama_siswa]</option>";
					}
				?>
			</select>
		</div>
		<div class="col-lg-3">
			<label>Jumlah Bulan</label>
			<select name="jumlah_bulan" id="jumlah_bulan" class="form-control">
			<?php 
				for($i=1;$i<=12;$i++){
					echo "<option>$i</option>";
				}
			?>
			</select>
		</div>
		<div class="col-lg-3">
			<label>Total</label>
			<input type="number" id="total" class="form-control" name="total" value="" readonly>
			<input type="hidden" id="" class="form-control" name="nominal" value="<?= $spp[0]["spp"]?>">
		</div>

		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
