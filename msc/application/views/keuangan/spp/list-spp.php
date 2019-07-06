<form action="" method="get">
<div class="row">
	<div class="col-lg-3">
		<label>Group</label>
		<select name="kode_group" id="group_spp" class="form-control">
			<option value="">---Pilih Group---</option>
			<?php 
				foreach ($group as $g) {
					echo "<option value='".$g['kode_group']."'>$g[nama_group]</option>";
				}
				?>
		</select>
	</div>
	<div class="col-lg-3">
		<label>Kode Siswa</label>
			<select name="kode_siswa" id="siswa_spp" class="form-control">
			</select>
			<!-- <input type="text" class="form-control" id="siswa_spp"> -->
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
		<select name="bulan" class="form-control">
			<option value="">---Option---</option>
			<?php
				foreach ($bulan as $b => $val) 
				{
					if($b > 0){
						echo '<option value="'.$b.'">'.$val.'</option>';
					}
				}
				?>
		</select>
	</div>
</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
</form>
<?php
	if(empty($_GET["kode_siswa"]) && empty($_GET["kode_group"])){

?>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<thead>
			<table class="table table-striped table-bordered table-hover">
					<tr>
						<th rowspan="2" class="align-middle text-center">Kode Siswa</th>
						<th rowspan="2" class="align-middle text-center">Nama Siswa</th>
						<th colspan="6" class="text-center"><?= date("Y")?></th>
						<th rowspan="2" class="align-middle text-center">Aksi</th>
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
						<th>
						<?php
							$dropdown["id"] = "menu".$val["kode_siswa"];
							$dropdown["href"] = array(
								"Detail" => base_url()."keuangan/spp/detail_spp/".$val["kode_siswa"]
							);
							$this->load->view("common/dropdown", $dropdown);
						?>
						</th>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php } ?>