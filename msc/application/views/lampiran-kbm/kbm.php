<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <?php foreach($jadwal as $data){?>
                    <tr>
                        <th>Kode Jadwal</th>
                        <th><?php echo $data["id_jadwal"]?></th>
                        <th>Minggu Ke-</th>
                        <th><?php echo $data["minggu_ke"]?></th>
                    </tr>
                    <tr>
                        <th>Nama Group</th>
                        <th><?php echo $data["nama_group"]?></th>
                        <th>Nama Mapel</th>
                        <th><?php echo $data["mata_pelajaran"]?></th>
                    </tr>
                    <tr>
                        <th>Nama Tentor</th>
                        <th><?php echo $data["nama_tentor"]?></th>
                        <th>Hari</th>
                        <th><?php echo $data["hari"]?></th>
                    </tr>
                    <tr>
                        <th>Jam Mulai</th>
                        <th><?php echo $data["jam_mulai"]?></th>
                        <th>Jam Selesai</th>
                        <th><?php echo $data["jam_slesai"]?></th>
                    </tr>
                <?php }?>
			</table>
		</div>
	</div>
</div>
<hr>
<?php 
    $kbm = empty($this->uri->segment(4)) ? "active" : "";
    $abs = !empty($this->uri->segment(4)) && $this->uri->segment(4)=="absensi" ? "active" : "";
?>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php echo $kbm ?>" href="<?php echo base_url()."lkbm/kbm/".$this->uri->segment(3) ?>">KBM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $abs ?>" href="<?php echo base_url()."lkbm/kbm/".$this->uri->segment(3)."/absensi" ?>">Absensi</a>
            </li>
        </ul>        
    </div>
</div>
<br>
<?php 
    if($kbm=="active"){
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card border-left-danger">
            <div class="card-body">
                <form action="" method="post">
                <h4><b>Pengumuman</b></h4>
                <textarea name="pengumuman" class="form-control"><?php echo $data['pengumuman'] ?></textarea>
                <br>
                <?php 
                    $this->load->view("common/btn");
                    ?>
                    </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card border-left-primary">
            <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <h4><b>Lampiran</b></h4>
                <input type="hidden" name="inputlampiran" value="true">
                <div class="row">
                    <div class="col-lg-6">
                        <label>File</label>
                        <input type="file" name="lampiran0" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label>Caption</label>
                        <input type="text" name="caption[]"class="form-control">
                    </div>
                </div>
                <div class="place">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <br>
                        <a href="" class="btn btn-sm btn-info addField">Tambah Lampiran</a>
                    </div>
                    <div class="col-auto ml-auto">
                        <br>
                        <?php 
                            $this->load->view("common/btn");
                        ?>
                    </div>
                </div>
                <br>
            </form>
            <hr>
            <?php 
                if(count($lampiran)>0){
                    foreach($lampiran as $lam){
                        ?>
                        <h3><?php echo $lam['caption'] ?></h3>
                        <hr>
                        <a href="<?php echo base_url()."assets/img/".$lam['lampiran'] ?>"><b class="text-primary"><?php echo $lam['lampiran'] ?></b></a>
                        <br>
                        <br>
                        <?php
                    } 
                } 
            ?>
            </div>
        </div>
    </div>
</div>
<?php } else{ 
$siswa = $this->common->getData("kode_siswa,nama_siswa","siswa","",["kode_group" => $jadwal[0]['kode_group']],["kode_siswa","desc"]);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Hadir</th>
                        <th>Kode Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Hadir</th>
                        <th>Tidak Hadir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($siswa as $key => $s){
                    ?>
                        <tr>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Hadir</button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fas fa-minus-circle"></i>
                                Tidak Hadir
                                </button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Tanpa Keterangan</a>
                                    <a class="dropdown-item" href="#">Ijin</a>
                                    <a class="dropdown-item" href="#">Sakit</a>
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td><?php echo $s['kode_siswa'] ?></td>
                            <td><?php echo $s['nama_siswa'] ?></td>
                            <td> <i class="fas fa-check-circle text-success"></i></td>
                            <td>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>