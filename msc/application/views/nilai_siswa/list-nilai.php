<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Kode Siswa</th>
						<th>Nilai Siswa</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Kode Tentor</th>
						<th>Tanggal Uploud</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($data as $d){?>
					<tr>
						<td><?php echo $d["id_nilai"]?></td>
						<td><?php echo $d["kode_siswa"]?></td>
						<td><?php echo $d["sikap"]?></td>
						<td><?php echo $d["bulan"]?></td>
						<td><?php echo $d["tahun"]?></td>
						<td><?php echo $d["kode_tentor"]?></td>
						<td><?php echo $d["tanggal_penilaian"]?></td>
						<td>
						<?php
							$dropdown["id"] = "menu".$d["id_nilai"];
							$dropdown["href"] = array(
								"Edit" => base_url()."nilai_siswa/edit_nilai".$d["id_nilai"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?>
						</td>
					</tr>
						<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
