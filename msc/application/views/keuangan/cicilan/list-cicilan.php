<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Siswa</th>
						<th>Nama Siswa</th>
						<th>Total Cicilan</th>
						<th>Sisa Cicilan</th>
						<th>Terbayar</th>
						<th>Kekurangan</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($siswa as $s) { 
					//sisa cicilan
					$terakhir_cicilan_ke = $this->common->getData("cicilan_ke", ["pembayaran_cicilan", 1], "", ["kode_siswa" => $s["kode_siswa"]], ["cicilan_ke", "desc"]);
					if(count($terakhir_cicilan_ke) == 0){
						$cicilan_terakhhir = 0;
					}
					else{
						$cicilan_terakhhir = $terakhir_cicilan_ke[0]["cicilan_ke"];
					}
					$sisa_cicilan = 6 - $cicilan_terakhhir;
					//terbayar
					$terbayar = $this->common->getData("sum(nominal) total", "pembayaran_cicilan", "", ["kode_siswa" => $s["kode_siswa"]], "");
					//kekurangan
					$kekurangan = $s["cicilan"] - $terbayar[0]["total"];
					if ($kekurangan > 0) {
						?>
					<tr>
						<td><?= $s["kode_siswa"]?></td>
						<td><?= $s["nama_siswa"]?></td>
						<td>Rp. <?= number_format($s["cicilan"],2,',','.')?></td>
						<td><?= $sisa_cicilan?></td>
						<td>Rp. <?= number_format($terbayar[0]["total"],2,',','.')?></td>
						<td>Rp. <?= number_format($kekurangan,2,',','.')?></td>
					</tr>
				<?php 
					}
				}?>
				</tbody>
			</table>
		</div>
	</div>
</div>
