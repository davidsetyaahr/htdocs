<form action="<?php echo base_url()."keuangan/gaji/insert_gaji" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Nama Tentor</label>
			<select name="kode_tentor" class="form-control">
				<option value="">---Pilih Tentor---</option>
				<?php foreach ($data as $d){?>
				<option value="<?php echo $d["kode_tentor"]?>"><?php echo $d["nama_tentor"]?></option>
				<?php }?>
			</select>
		</div>
        <div class="col-lg-6">
			<label>Bulan</label>
			<select id="" class="form-control" name="bulan">
				<option value="">---Option---</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
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
			<input type="number" class="form-control" name="nominal" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
