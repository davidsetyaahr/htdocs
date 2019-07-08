<form action="<?php echo base_url()."jadwal/update_jadwal"?>" method="post">
    <div class="row">
        <div class="col-lg-6">
            <label for="">ID Jadwal</label>
            <input type="text" class="form-control" name="id_jadwal" value="<?= $jadwal[0]["id_jadwal"]?>">
        </div>
                <div class="col-lg-6">
                    <label for="">Nama Group</label>
                    <select name="kode_group" class="form-control">
                        <option value="">---Pilih Group---</option>
                        <?php foreach($group as $g){
                        $kode = ($g["kode_group"] == $jadwal[0]["kode_group"]) ? "selected" : "";    
                        ?>
                        <option value="<?php echo $g["kode_group"]?>" <?= $kode?>><?php echo $g["nama_group"]?></option>
                        <?php }?>
                    </select>
                </div>
        <div class="col-lg-6">
            <label for="">Minggu Ke-</label>
            <select name="minggu_ke" class="form-control">
                <option value="">---Pilih Minggu---</option>
                <?php for($i=1;$i<=4;$i++){
                    $kode = ($jadwal[0]["minggu_ke"] == $i) ? "selected" : "";    
                ?>
                <option value="<?php echo $i?>" <?= $kode?>>Minggu Ke <?php echo $i?></option>   
                <?php }?>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Hari</label>
            <select name="hari" class="form-control">
                <option value="">---Pilih Hari---</option>
                <?php
                    $hari = array(
                        "Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"
                    );
                    foreach($hari as $h){
                        $kode = ($jadwal[0]["hari"] == $h) ? "selected" : "";
                        ?>
                <option value="<?php echo $h?>"<?= $kode?>><?php echo $h?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Tentor</label>
            <select name="id_mapel_tentor" class="form-control">
                <option value="">---Pilih Tentor---</option>
                <?php foreach($mapelT as $t){    
                    $kode = ($jadwal[0]["id_mapel_tentor"] == $t["id_mapel_tentor"]) ? "selected" : "";
                ?>
                <option value="<?php echo $t["id_mapel_tentor"]?>" <?= $kode?>><?php echo $t["nama_tentor"]." - ".$t['mata_pelajaran']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Waktu Mulai</label>
            <input type="text" class="form-control time-24" name="jam_mulai" value="<?php echo $jadwal[0]["jam_mulai"]?>">
        </div>
        <div class="col-lg-6">
            <label for="">Waktu Selesai</label>
            <input type="text" class="form-control time-24" name="jam_slesai" value="<?php echo $jadwal[0]["jam_slesai"]?>">
        </div>
        <div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
    </div>
</form>