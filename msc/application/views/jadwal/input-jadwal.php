<form action="<?php echo base_url()."jadwal/insert_jadwal"?>" method="post">
    <div class="row">
         <div class="col-lg-6">
            <label for="">Nama Group</label>
            <select name="kode_group" class="form-control">
                <option value="">---Pilih Group---</option>
                <?php foreach($group as $g){?>
                <option value="<?php echo $g["kode_group"]?>"><?php echo $g["nama_group"]?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Minggu Ke-</label>
            <select name="minggu_ke" class="form-control">
                <option value="">---Pilih Minggu---</option>
                <?php 
                $minggu = 1;
                for($i=0; $i<4; $i++){
                ?>
                <option><?php echo $minggu;?></option>   
                <?php 
                $minggu++;
                }?>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Hari</label>
            <select name="hari" class="form-control">
                <option value="">---Pilih Hari---</option>
                <option value="Sun">Minggu</option>
                <option value="Mon">Senin</option>
                <option value="Tue">Selasa</option>
                <option value="Wed">Rabu</option>
                <option value="Thu">Kamis</option>
                <option value="Fri">Jumat</option>
                <option value="Sat">Sabtu</option>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Tentor</label>
            <select name="id_mapel_tentor" class="form-control">
                <option value="">---Pilih Tentor---</option>
                <?php foreach($mapelT as $t){?>
                <option value="<?php echo $t["id_mapel_tentor"]?>"><?php echo $t["nama_tentor"]." - ".$t['mata_pelajaran']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Waktu Mulai</label>
            <input type="input" class="form-control time-24" name="jam_mulai" >
        </div>
        <div class="col-lg-6">
            <label for="">Waktu Selesai</label>
            <input type="input" class="form-control time-24" name="jam_slesai" >
        </div>
        <div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
    </div>
</form>