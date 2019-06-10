<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="lkbm">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Jadwal</th>
						<th>Minggu Ke-</th>
						<th>Nama Group</th>
						<th>Nama Mapel</th>
						<th>Nama Tentor</th>
						<th>Hari</th>
						<th>Jam Mulai</th>
						<th>Jam Selesai</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<?php 
				$no = 1;
				foreach($jadwal as $data){?>
				<tbody>
					<tr>
						<th><?= $no?></th>
						<th><?php echo $data["id_jadwal"]?></th>
						<th><?php echo $data["minggu_ke"]?></th>
						<th><?php echo $data["nama_group"]?></th>
						<th><?php echo $data["mata_pelajaran"]?></th>
						<th><?php echo $data["nama_tentor"]?></th>
						<th><?php echo $data["hari"]?></th>
						<th><?php echo $data["jam_mulai"]?></th>
						<th><?php echo $data["jam_slesai"]?></th>
						<th>
                        <?php
							$day = date("D");
                            $now = date("H:i:s");
                            $mulaitamp = strtotime($data['jam_mulai']) - 60*60;
							$mulai = date("H:i:s", $mulaitamp);
							if($this->common_lib->indoDay($day)==$data['hari'] && ($now >= $mulai) && ($now <= $data["jam_slesai"])){
                                echo "<a href='".base_url()."lkbm/kbm/$data[id_jadwal]' class='btn btn-primary btn-sm'>Masuk</a>";
                            }
                            else{
                                echo "Tidak Bisa Melakukan Aksi";
							}
                        ?>
                        </th>
					</tr>
				</tbody>
						<?php $no++; }?>
			</table>
		</div>
	</div>
</div>
