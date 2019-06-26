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
