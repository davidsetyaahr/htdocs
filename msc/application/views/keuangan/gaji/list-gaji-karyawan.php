<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama Tentor</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Nominal</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($gaji as $value) {
				?>
				<tr>
					<td><?php echo $value['nama_tentor'] ?></td>
					<td><?php echo $value['bulan'] ?></td>
					<td><?php echo $value['tahun'] ?></td>
					<td><?php echo $value['nominal'] ?></td>
					<td><?php echo $value['tanggal_bayar'] ?></td>

				</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
