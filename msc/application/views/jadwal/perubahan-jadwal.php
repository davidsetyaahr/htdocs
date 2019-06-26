<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Siswa</th>
						<th>Ke Hari</th>
						<th>Ke Minggu</th>
						<th>Ke Jam</th>
						<th>Status</th>
						<th>opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($req_jadwal as $value) {
					?>
				<tr>
					<td><?php echo $value['kode_siswa'] ?></td>
					<td><?php echo $value['ke_hari'] ?></td>
					<td><?php echo $value['ke_minggu'] ?></td>
					<td><?php echo $value['ke_jam'] ?></td>
					<td><?php echo $value['status'] ?></td>
					<td>
						<?php
							$dropdown["id"] = "menu".$value["kode_siswa"];
							$dropdown["href"] = array(
								"Terima" => base_url()."data_siswa/edit_siswa/".$value["kode_siswa"],
								"Tolak" => base_url()."data_siswa/detail/".$value["kode_siswa"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?>
						</td>

				</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
