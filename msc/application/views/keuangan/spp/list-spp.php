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
				<option value="">---Option---</option>
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
				<?php 
				if(empty($_GET["kode_siswa"]) && empty($_GET["kode_group"]) && empty($_GET["tahun"]) && empty($_GET["bulan"])){
						
				foreach ($siswa as $key => $val) {?>
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
				<?php 		}
						}
				else if(empty($_GET["kode_siswa"]) && isset($_GET["kode_group"]) && isset($_GET["tahun"]) && empty($_GET["bulan"])){
				
				//semua siswa berdasarkan group
				$s_group = $this->common->getData("kode_siswa, nama_siswa", "siswa s", ["group_siswa g", "s.kode_group=g.kode_group"], ["s.kode_group" => $_GET["kode_group"]], "");
				foreach ($s_group as $key => $val) {?>
					<tr>
						<th><?= $val["kode_siswa"]?></th>
						<th><?= $val["nama_siswa"]?></th>
						<?php
							foreach($bulan as $b => $v){
								if($b>0){
									$spp = $this->common->getData("count(d.bulan) ttl", "detail_pembayaran_spp d", ["pembayaran_spp p","d.id_pembayaran_spp = p.id_pembayaran_spp", "siswa s", "p.kode_siswa=s.kode_siswa", "group_siswa g", "s.kode_group=g.kode_group"], ["p.kode_siswa" => $val["kode_siswa"],"d.bulan" => $b,"d.tahun" => $_GET["tahun"], "s.kode_group" => $_GET["kode_group"]], "");
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
				<?php 		}
						}
				
				else if(isset($_GET["kode_siswa"]) && isset($_GET["kode_group"]) && isset($_GET["tahun"]) && empty($_GET["bulan"])){
					
				//semua siswa berdasarkan group
				$s_group = $this->common->getData("p.kode_siswa, nama_siswa", "pembayaran_spp p", ["siswa s", "p.kode_siswa=s.kode_siswa", "group_siswa g", "s.kode_group=g.kode_group", "detail_pembayaran_spp d", "p.id_pembayaran_spp=d.id_pembayaran_spp"], ["s.kode_group" => $_GET["kode_group"], "d.tahun" => $_GET["tahun"]], "");
				foreach ($s_group as $key => $val) {?>
					<tr>
						<th><?= $val["kode_siswa"]?></th>
						<th><?= $val["nama_siswa"]?></th>
						<?php
							foreach($bulan as $b => $v){
								if($b>0){
									$spp = $this->common->getData("count(d.bulan) ttl", "detail_pembayaran_spp d", ["pembayaran_spp p","d.id_pembayaran_spp = p.id_pembayaran_spp", "siswa s", "p.kode_siswa=s.kode_siswa", "group_siswa g", "s.kode_group=g.kode_group"], ["p.kode_siswa" => $val["kode_siswa"],"d.bulan" => $b,"d.tahun" => $_GET["tahun"], "s.kode_group" => $_GET["kode_group"]], "");
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
				<?php 		}
						}
				
				else if(isset($_GET["kode_siswa"]) && isset($_GET["kode_group"]) && isset($_GET["tahun"]) && isset($_GET["bulan"])){
					
				//semua siswa berdasarkan group dan bulan bayar
				$s_group = $this->common->getData("p.kode_siswa, nama_siswa", "pembayaran_spp p", ["siswa s", "p.kode_siswa=s.kode_siswa", "group_siswa g", "s.kode_group=g.kode_group", "detail_pembayaran_spp d", "p.id_pembayaran_spp=d.id_pembayaran_spp"], ["s.kode_group" => $_GET["kode_group"], "d.tahun" => $_GET["tahun"], "d.bulan" => $_GET["bulan"]], "");
				foreach ($s_group as $key => $val) {?>
					<tr>
						<th><?= $val["kode_siswa"]?></th>
						<th><?= $val["nama_siswa"]?></th>
						<?php
							foreach($bulan as $b => $v){
								if($b>0){
									$spp = $this->common->getData("count(d.bulan) ttl", "detail_pembayaran_spp d", ["pembayaran_spp p","d.id_pembayaran_spp = p.id_pembayaran_spp", "siswa s", "p.kode_siswa=s.kode_siswa", "group_siswa g", "s.kode_group=g.kode_group"], ["p.kode_siswa" => $val["kode_siswa"],"d.bulan" => $b,"d.tahun" => $_GET["tahun"], "s.kode_group" => $_GET["kode_group"]], "");
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
				<?php 		}
						}
				
				else if($_GET["kode_siswa"]=="" && $_GET["kode_group"]=="" && $_GET["tahun"]!= "" && $_GET["bulan"]==""){
					
				//semua siswa berdasarkan group dan bulan bayar
				$s_group = $this->common->getData("p.kode_siswa, nama_siswa", "pembayaran_spp p", ["siswa s", "p.kode_siswa=s.kode_siswa", "group_siswa g", "s.kode_group=g.kode_group", "detail_pembayaran_spp d", "p.id_pembayaran_spp=d.id_pembayaran_spp"], ["s.kode_group" => $_GET["kode_group"], "d.tahun" => $_GET["tahun"], "d.bulan" => $_GET["bulan"]], "");
				foreach ($s_group as $key => $val) {?>
					<tr>
						<th><?= $val["kode_siswa"]?></th>
						<th><?= $val["nama_siswa"]?></th>
						<?php
							foreach($bulan as $b => $v){
								if($b>0){
									$spp = $this->common->getData("count(d.bulan) ttl", "detail_pembayaran_spp d", ["pembayaran_spp p","d.id_pembayaran_spp = p.id_pembayaran_spp", "siswa s", "p.kode_siswa=s.kode_siswa", "group_siswa g", "s.kode_group=g.kode_group"], ["p.kode_siswa" => $val["kode_siswa"],"d.bulan" => $b,"d.tahun" => $_GET["tahun"], "s.kode_group" => $_GET["kode_group"]], "");
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
				<?php 		}
						}
				
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>