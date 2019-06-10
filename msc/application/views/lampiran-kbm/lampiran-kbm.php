<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="lkbm">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Lampiran</th>
						<th>Lampiran</th>
						<th>Caption</th>
						<th>Nama Group</th>
						<th>Nama Tentor</th>
						<th>Mapel</th>
						<th>Jam Mulai</th>
						<th>Jam Selesai</th>
						<th>Minggu Ke-</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<?php 
				$no = 1;
				foreach($data as $data){?>
				<tbody>
					<tr>
						<th><?= $no?></th>
						<th><?php echo $data["id_lampiran"]?></th>
						<th><?php echo $data["lampiran"]?></th>
						<th><?php echo $data["caption"]?></th>
						<th><?php echo $data["nama_group"]?></th>
						<th><?php echo $data["nama_tentor"]?></th>
						<th><?php echo $data["mata_pelajaran"]?></th>
						<th><?php echo $data["jam_mulai"]?></th>
						<th><?php echo $data["jam_slesai"]?></th>
						<th><?php echo $data["minggu_ke"]?></th>
						<th>
						<?php
							$dropdown["id"] = "menu".$data["id_lampiran"];
							$dropdown["href"] = array(
								"Edit" => base_url()."lkbm/edit_lkbm/".$data["id_lampiran"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?>
						</th>
					</tr>
				</tbody>
						<?php $no++; }?>
			</table>
		</div>
	</div>
</div>
