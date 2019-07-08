<form method="post" action="<?php echo base_url("nilai_siswa/input_nilai")?>">
    <div class="row">
        <div class="col-lg-4">
            <Label for="">Kode Group</Label>
            <select name="kode_group" id="" class="form-control">
                <option value="">---Pilih Group---</option>
                <?php 
                foreach($group as $g){
                     $s = isset($_POST['kode_group']) && $g["kode_group"]==$_POST['kode_group'] ? "selected" : "";
                     ?>
                <option value="<?php echo $g["kode_group"]?>" <?php echo $s ?>><?php echo $g["nama_group"]?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-4">
            <Label for="">Bulan</Label>
            <select name="bulan" id="" class="form-control">
            <option value="">---Pilih Bulan---</option>
                <?php 
                    $bulan = array(
                        1 => "Januari", 
                        2 => "Februari", 
                        3 => "Maret", 
                        4 => "April", 
                        5 => "Mei", 
                        6 => "Juni", 
                        7 => "Juli", 
                        8 => "Juli", 
                        9 => "Agustus", 
                        10 => "Sepetember", 
                        11 => "November", 
                        12 => "Desember"
                    );
                    $mnth = date("Y-m-d");
                    foreach($bulan as $key => $val){
                    $b = isset($_POST['bulan']) && $key == $_POST['bulan'] ? "selected" : "";
                    ?>
                <option value="<?= $key?>" <?= $b?>><?= $val?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-4">
            <Label for="">Tahun</Label>
            <select name="tahun" id="" class="form-control">
                <option value="">---Pilih Tahun---</option>
                    <?php 
                        $th = date("Y");
                        $praTh = $th + 4;
                        $preTh = $th - 1;
                        for($i=$preTh; $i<=$praTh; $i++){
                            $t = isset($_POST['tahun']) && $i==$_POST['tahun'] ? "selected" : "";
                    ?>
                <option <?php echo $t?>><?php echo $i?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-lg-4">
            <br>
            <button name="simpan" type="submit" class="btn btn-info btn-sm">Simpan</button>
            <a href="" type="reset"class="btn btn-danger btn-sm">Cancel</a>
        </div>
    </div>
</form>
<br>    
<?php 
    if(isset($_POST['kode_group']) && isset($_POST["bulan"]) && isset($_POST["tahun"])){
?>
<input type="hidden" name="kode_group" value="<?php echo $_POST['kode_group'] ?>">
<form method="post" action="<?php echo base_url("nilai_siswa/insert_nilai")?>">
<input type="hidden" name="bulan" value="<?php echo $_POST['bulan'] ?>">
<input type="hidden" name="tahun" value="<?php echo $_POST['tahun'] ?>">
    <?php foreach($siswa as $key => $s){
        $bg = $key%2==0 ? "warning" : "danger";    
        $cl = $key%2==0 ? "danger" : "info";    
        $tanggal = date("Y-m-d");    
        ?>
    <div class="card shadow mb-4 border-left-<?php echo $bg ?>">
        <div class="card-header">
            <label for="" class="text-<?= $cl?>">Siswa <?= $s["nama_siswa"]?></label>
        </div>
        <div class="card-body">
            <div class="row">
                <input type="hidden" name="id_nilai[]" class="form-control">
                <input type="hidden" name="id_nilai_mapel" class="form-control">
                <div class="col-lg-6">
                    <label for="">Kode Siswa</label>
                    <input type="text" class="form-control" value="<?php echo $s['kode_siswa'] ?>" name="kode_siswa[]" readonly>
                </div>
                <div class="col-lg-6">
                    <label for="">Nilai Sikap</label>
                    <select name="sikap[]" id="" class="form-control">
                        <option value="">---Pilih Nilai---</option>
                        <option value="95">A</option>
                        <option value="85">B</option>
                        <option value="75">C</option>
                    </select>
                </div>
                <div class="col-lg-12">
                <br>
                <?php foreach($mapel as $i => $m){
                    ?>
                    <div class="row" id="mapel<?php echo $key ?>">
                    <div class="col-lg-4">
                        <label for="">Mapel</label>
                        <input type="hidden" name="id_mapel[<?php echo $key ?>][]" class="form-control" value="<?= $m["id_mapel"]?>">
                        <input type="text" class="form-control" value="<?= $m["mata_pelajaran"]?>" disabled>
                    </div>
                        <div class="col-lg-4">
                            <label for="">Nilai</label>
                            <input type="text" name="nilai[<?php echo $key ?>][]" id="" class="form-control" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="">Catatan</label>
                            <textarea name="catatan[<?php echo $key ?>][]" id="" class="form-control"></textarea>
                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <div class="col-auto ml-auto">
        <div class="hai">
            
        </div>
        <br>
        <?php 
            $this->load->view("common/btn");
            ?>
    </div>
</form>
    <?php } ?>