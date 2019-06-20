<form action="<?php echo base_url()."keuangan/cicilan/input_cicilan" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Nama Tentor</label>
			<select name="" id="" class="form-control" name="nama_tentor">
				<option value="">---Option---</option>
			</select>
		</div>
        <div class="col-lg-6">
			<label>Bulan</label>
			<select name="" id="" class="form-control" name="bulan">
				<option value="">---Option---</option>
                <option>Januari</option>
                <option>Februari</option>
                <option>Maret</option>
                <option>April</option>
                <option>Mei</option>
                <option>Juni</option>
                <option>Juli</option>
                <option>Agustus</option>
                <option>September</option>
                <option>Oktober</option>
                <option>November</option>
                <option>Desember</option>
			</select>
		</div>
		<div class="col-lg-6">
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
		<div class="col-lg-6">
			<label>Nominal</label>
			<input type="number" class="form-control" name="nominal" value="" readonly>
		</div>
        <div class="col-lg-6">
			<label>Tanggal</label>
			<input type="number" class="form-control" name="tanggal" value="" readonly>
		</div>

		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
