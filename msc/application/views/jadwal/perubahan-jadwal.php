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
					<td></td>

				</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
