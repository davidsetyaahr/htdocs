<form action="<?php echo base_url()."kbm/insert_kbm"?>" method="post" id="myform">
    <div class="row">
        <div class="col-lg-6">
            <label for="">ID L-KBM</label>
            <input type="text" class="form-control" name="id_lampiran">
        </div>
        <div class="col-lg-6">
            <label for="">Tentor</label>
            <div class="row">
                <div class="col-lg-9">
                    <select class="form-control" id="id_tentor" readonly>
                        <option value="">Jadwal Belum Dipilih</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Pilih Jadwal</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <label for="">Caption</label>
            <textarea class="form-control" name="caption"></textarea>
        </div>
        <div class="col-lg-6">
            <label for="">Lampiran KBM</label>
            <input type="file" class="form-control" name="lampiran">   
        </div>
        <div class="col-lg-6">
            <br>
			<?php $this->load->view("common/btn") ?>
		</div>
    </div>
</form>

<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">List Jadwal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<!-- memulai untuk konten dinamis -->
			<!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
			<div class="modal-body" id="data_siswa">
            <table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Jadwal</th>
						<th>Minggu Ke-</th>
						<th>Nama Group</th>
						<th>Nama Mapel</th>
						<th>Nama Tentor</th>
						<th>Hari</th>
						<th>Jam Mulai</th>
						<th>Jam Selesai</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php foreach($jadwal as $data){?>
				<tbody>
					<tr>
						<th><?php echo $data["id_jadwal"]?></th>
						<th><?php echo $data["minggu_ke"]?></th>
						<th><?php echo $data["nama_group"]?></th>
						<th><?php echo $data["mata_pelajaran"]?></th>
						<th><?php echo $data["hari"]?></th>
						<th><?php echo $data["nama_tentor"]?></th>
						<th><?php echo $data["jam_mulai"]?></th>
						<th><?php echo $data["jam_slesai"]?></th>
                        <th><button type="button" data-modal="#myModal" data-value="<?php echo $data["id_jadwal"]?>" class="btn btn-primary getId" data-target="#id_tentor">Pilih</button></th>
                    </tr>
				</tbody>
						<?php }?>
			</table>
            </div>
			<!-- selesai konten dinamis -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>