<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="lkbm">
                <thead>
					<tr>
						<!-- <th>#</th> -->
						<th>Nama Tentor</th>
						<th>Jenis Kelamin</th>
						<th>Pendidikan Terakhir</th>
						<th>Mapel</th>
						<th>No. HP</th>
						<th>Alamat</th>
						<th>Gaji</th>
						<th>Aksi</th>
					</tr>
				</thead>
                <?php 
					foreach($data as $t){
						?>
				<tbody>
					<tr>
						<!-- <th><?php echo $t["kode_tentor"]?></th> -->
						<th><?php echo $t["nama_tentor"]?></th>
						<th><?php echo $t["jk"]?></th>
						<th><?php echo $t["pendidikan_terakhir"]?></th>
						<th><?php 
							$mapel = $this->common->getData("m.mata_pelajaran", "mapel_tentor mt", ["mapel m", "m.id_mapel=mt.id_mapel"], ["mt.kode_tentor" => $t['kode_tentor']], "");
							foreach($mapel as $m){
									echo "-> ";
									echo $m['mata_pelajaran'];
									echo "<br>";
							}
						?></th>
						<th><?php echo $t["no_hp"]?></th>
						<th><?php echo $t["alamat"]?></th>
						<th>Rp. <?php echo number_format($t["gaji"],2,',','.')?></th>
						<th><?php
							$dropdown["id"] = "menu".$t["kode_tentor"];
							$dropdown["href"] = array(
								"Edit" => base_url()."tentor/edit_tentor/".$t["kode_tentor"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?></th>
					</tr>
				</tbody>
				<?php   } 
				?>
			</table>
		</div>
	</div>
</div>