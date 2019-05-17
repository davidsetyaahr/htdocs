<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Jadwal</th>
						<th>Minggu Ke-</th>
						<th>Nama Group</th>
						<th>Nama Mapel</th>
						<th>Nama Tentor</th>
						<th>Hari</th>
						<th>Jam Mulai</th>
						<th>Jam Selesai</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<?php foreach($data as $data){?>
				<tbody>
					<tr>
						<th><?php echo $data["id_jadwal"]?></th>
						<th><?php echo $data["minggu_ke"]?></th>
						<th><?php echo $data["nama_group"]?></th>
						<th><?php echo $data["mata_pelajaran"]?></th>
						<th><?php echo $data["nama_tentor"]?></th>
						<th><?php echo $data["hari"]?></th>
						<th><?php echo $data["jam_mulai"]?></th>
						<th><?php echo $data["jam_slesai"]?></th>
						<th>
						<?php
							$dropdown["id"] = "menu".$data["id_jadwal"];
							$dropdown["href"] = array(
								"Edit" => base_url()."jadwal/edit_jadwal/".$data["id_jadwal"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?>
						</th>
					</tr>
				</tbody>
						<?php }?>
			</table>
		</div>
	</div>
</div>
