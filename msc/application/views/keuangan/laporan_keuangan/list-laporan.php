<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
						<th>Nominal</th>
						<th>Yang Bayar</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$no = 1;
				foreach ($laporan as $key => $value) {
					if($value["tipe"] == "Cicilan"){
						$getNamaBayar = $this->common->getData("s.nama_siswa", "pembayaran_cicilan p", ["siswa s", "p.kode_siswa=s.kode_siswa"], ["p.id_pembayaran_cicilan" => $value["id_parent"]], "");
						
						$pembayar = $getNamaBayar[0]["nama_siswa"];
					}
					else if($value["tipe"] == "Spp"){
						$getNamaBayar = $this->common->getData("s.nama_siswa", "pembayaran_spp p", ["siswa s", "p.kode_siswa=s.kode_siswa"], ["p.id_pembayaran_spp" => $value["id_parent"]], "");
						
						$pembayar = $getNamaBayar[0]["nama_siswa"];
					}
					else if($value["tipe"] == "Pendaftaran"){
						$getNamaBayar = $this->common->getData("nama_siswa", "siswa", "", ["id_siswa" => $value["id_parent"]], "");
						
						$pembayar = $getNamaBayar[0]["nama_siswa"];
					}
					else if($value["tipe"] == "Gaji"){
						$getNamaBayar = $this->common->getData("t.nama_tentor", "pembayaran_gaji p", ["tentor t", "p.kode_tentor=t.kode_tentor"], ["p.id_pembayaran" => $value["id_parent"]], "");
						
						$pembayar = $getNamaBayar[0]["nama_tentor"];
					}

					$rupiah = "Rp. ".number_format($value["nominal"], 2, ',' , '.')
					
				?>
					<tr>
						<td><?= $no?></td>
						<td><?= $value["tanggal"]?></td>
						<td><?= $value["tipe"]?></td>
						<td><?= $rupiah?></td>
						<td><?= $pembayar?></td>
					</tr>
					
				<?php $no++; }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
