<form action="<?php echo base_url()."daftar_siswa/" ?>" method="post">
<div class="row">
		<div class="col-lg-3">
			<label>foto</label>
			<input type="text" class="form-control" name="foto" value="" readonly>
		</div>
		<div class="col-lg-9">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<?php
						foreach ($detail as $key => $value) {
						
					?>
					<tr>
						<th>Kode Siswa</th>		<th>:</th> <td><?php echo $value['kode_siswa'] ?></td>
						<th>Nama Siswa</th>		<th>:</th> <td><?php echo $value['nama_siswa'] ?></td>
					</tr>
					<tr>
						<th>Tanggal Lahir</th>	<th>:</th> <td><?php echo $value['tgl_lahir'] ?></td>
						<th>Jenis Kelamin</th>	<th>:</th> <td><?php echo $value['jk'] ?></td>
					</tr>
					<tr>
						<th>Alamat</th>			<th>:</th> <td><?php echo $value['alamat'] ?></td>
						<th>No Hp</th>			<th>:</th> <td><?php echo $value['no_hp'] ?></td>
					</tr>
					<tr>
						<th>Kode Group</th>		<th>:</th> <td><?php echo $value['kode_group'] ?></td>
						<th>Id Ortu</th>		<th>:</th> <td><?php echo $value['nama_ortu'] ?></td>
					</tr>
					<tr>
						<th>Tanggal Daftar</th>	<th>:</th> <td><?php echo $value['tgl_daftar'] ?></td>
						<th>Cicilan</th>		<th>:</th> <td><?php echo $value['cicilan'] ?></td>
					</tr><tr>
						<th>Kelas</th>			<th>:</th> <td><?php echo $value['kelas'] ?></td>
						<th>No Hp Wali</th>		<th>:</th> <td><?php echo $value['no_hp'] ?></td>
					</tr>
					<?php
						}
					?>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
