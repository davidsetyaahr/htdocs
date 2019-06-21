<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Siswa</th>
						<th>Nama Siswa</th>
						<th>Grup</th>
						<th>No Telepon</th>
						<th>Alamat</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($siswa as $key => $value) {
					?>
					<tr>
						<td><?php echo $value['kode_siswa'] ?></td>
						<td><?php echo $value['nama_siswa'] ?></td>
						<td><?php echo $value['kode_group'] ?></td>
						<td><?php echo $value['no_hp'] ?></td>
						<td><?php echo $value['alamat'] ?></td>
						<td>
						<?php
							$dropdown["id"] = "menu".$value["kode_siswa"];
							$dropdown["href"] = array(
								"Edit" => base_url()."data_siswa/edit_siswa/".$value["kode_siswa"],
								"Detail" => base_url()."data_siswa/detail/".$value["kode_siswa"],
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
