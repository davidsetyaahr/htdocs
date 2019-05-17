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
<div class="row">
    <div class="col-lg-12">
        <div class="card border-left-danger shadow h-100 py-2">
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
        <div class="card border-left-danger shadow h-100 py-2">
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
                        <a href="" type="button" class="btn btn-sm btn-info addField">Tambah Lampiran</a>
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
