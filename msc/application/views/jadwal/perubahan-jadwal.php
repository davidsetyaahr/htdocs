<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Siswa</th>
						<th>Jadwal Awal</th>
						<th>Permintaan Jadwal</th>
						<th>Status</th>
						<th>opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($req_jadwal as $value) {
					?>
				<tr>
					<td class="text-center align-middle"><?php echo $value['kode_siswa'] ?></td>
					<td>
						<table width="100%">
							<tr>
								<td>Hari</td>
								<td>:</td>
								<td><?php echo $value['hari'] ?></td>
							</tr>
							<tr>
								<td>Minggu Ke</td>
								<td>:</td>
								<td><?php echo $value['minggu_ke'] ?></td>
							</tr>
							<tr>
								<td>Waktu</td>
								<td>:</td>
								<td><?php echo $value['jam_mulai'] ?></td>
							</tr>
						</table>
					</td>
					<td>
					<table width="100%">
							<tr>
								<td>Hari</td>
								<td>:</td>
								<td><?php echo $value['ke_hari'] ?></td>
							</tr>
							<tr>
								<td>Minggu Ke</td>
								<td>:</td>
								<td><?php echo $value['ke_minggu'] ?></td>
							</tr>
							<tr>
								<td>Waktu</td>
								<td>:</td>
								<td><?php echo $value['ke_jam'] ?></td>
							</tr>
						</table>
					</td>
					<td class="text-center align-middle"><?php echo $value['status'] ?></td>
					<td class="text-center align-middle">
					<div class="dropdown no-arrow">
						<button class="btn btn-info btn-sm btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    						Opsi <span class="fas fa-caret-down"></span>
    					</button>
    					<div class="dropdown-menu" aria-labelledby="<?= $value["id_req"]?>">
							<a class="dropdown-item req_jadwal" name="Terima" id="<?= $value["id_req"]?>" href="<?php echo base_url()."permintaan_perubahan_jadwal/status/".$value['id_req']."/Diterima"."/".$value["id_jadwal"] ?>" >Terima</a>
							<a class="dropdown-item req_jadwal" name="Tolak" id="<?= $value["id_req"]?>" href="<?php echo base_url()."permintaan_perubahan_jadwal/status/".$value['id_req']."/Ditolak"."/".$value["id_jadwal"] ?>">Tolak</a>
						</div>
					</div>
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
