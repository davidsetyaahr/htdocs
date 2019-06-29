<div class="row">
	<div class="col-lg-3">
		<label>Kode Siswa</label>
		<select class="form-control">
			<option value="">---Option---</option>
		</select>
	</div>
	<div class="col-lg-3">
		<label>Group</label>
		<select class="form-control">
			<option value="">---Pilih Group---</option>
			<?php 
				foreach ($group as $g) {
					echo "<option value='".$g['kode_group']."'>$g[nama_group]</option>";
				}
			?>
		</select>
	</div>
	<div class="col-lg-3">
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
	<div class="col-lg-3">
		<label>Bulan</label>
		<select class="form-control">
			<option value="">---Option---</option>
			<option>januari</option>
			<option>februari</option>
			<option>maret</option>
			<option>april</option>
			<option>mei</option>
			<option>juni</option>
			<option>juli</option>
			<option>agustus</option>
			<option>september</option>
			<option>oktober</option>
			<option>november</option>
			<option>desember</option>
		</select>
	</div>
</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
                <thead>
					<tr>
						<th rowspan="2" class="align-middle text-center">Kode Siswa</th>
						<th rowspan="2" class="align-middle text-center">Nama Siswa</th>
						<th colspan="6" class="text-center"><?= date("Y")?></th>
					</tr>
					<tr>
						<?php
						$bulan = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni");
						foreach($bulan as $b => $val){
							if($b>0){
								echo "<th>$val</th>"; 
							}
						}
						?>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($siswa as $key => $val) {?>
					<tr>
						<th><?= $val["kode_siswa"]?></th>
						<th><?= $val["nama_siswa"]?></th>
						<?php 
							foreach($bulan as $b => $v){
								if($b>0){
									$spp = $this->common->getData("count(d.bulan) ttl", "detail_pembayaran_spp d", ["pembayaran_spp p","d.id_pembayaran_spp = p.id_pembayaran_spp"], ["p.kode_siswa" => $val["kode_siswa"],"d.bulan" => $b,"d.tahun" => date("Y")], "");
									echo "<th>";
									$fa = $spp[0]['ttl']==0 ? "fas fa-minus-circle text-danger" : "fas fa-check-circle text-success";
									echo "<span class='$fa'></span></th>";
								}
							}
						?>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
