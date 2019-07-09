<form action="<?php echo base_url().'permintaan_perubahan_jadwal/update_jadwal/'.$req[0]["id_req"]?>" method="post">
    <div class="row">
        <div class="col-lg-6">
            <label for="">ID Jadwal</label>
            <input type="text" class="form-control" name="id_jadwal" value="<?= $req[0]["id_jadwal"]?>" readonly>
        </div>
        <div class="col-lg-6">
            <label for="">Minggu Ke-</label>
            <select name="minggu_ke" class="form-control">
                <option value="">---Pilih Minggu---</option>
                <?php for($i=1;$i<=4;$i++){
                    $kode = ($req[0]["ke_minggu"] == $i) ? "selected" : "";    
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
                        $kode = ($req[0]["ke_hari"] == $h) ? "selected" : "";
                        ?>
                <option value="<?php echo $h?>"<?= $kode?>><?php echo $h?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-6">
            <label for="">Waktu Mulai</label>
            <input type="time" class="form-control" name="jam_mulai" value="<?php echo $req[0]["ke_jam"]?>">
        </div>
        <div class="col-lg-6">
            <label for="">Waktu Selesai</label>
            <?php 
                $waktu_selesai = strtotime($req[0]["jam_slesai"]);
                $waktu_mulai = strtotime($req[0]["jam_mulai"]);
                $selisih_waktu = $waktu_selesai - $waktu_mulai;
                $selisih = floor($selisih_waktu/(60*60));
                $jam = date("H:i", strtotime($req[0]["ke_jam"])+$selisih*60*60);
            ?>
            <input type="time" class="form-control" name="jam_slesai" value="<?php echo $jam ?>">
        </div>
        <div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
    </div>
</form>