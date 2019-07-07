<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <?php foreach($jadwal as $data){?>
                    <tr>
                        <th>Kode Jadwal</th>
                        <th>
                            <?php echo $data["id_jadwal"]?>
                        </th>
                        <th>Minggu Ke-</th>
                        <th>
                            <?php echo $data["minggu_ke"]?>
                        </th>
                    </tr>
                    <tr>
                        <th>Nama Group</th>
                        <th>
                            <?php echo $data["nama_group"]?>
                        </th>
                        <th>Nama Mapel</th>
                        <th>
                            <?php echo $data["mata_pelajaran"]?>
                        </th>
                    </tr>
                    <tr>
                        <th>Nama Tentor</th>
                        <th>
                            <?php echo $data["nama_tentor"]?>
                        </th>
                        <th>Hari</th>
                        <th>
                            <?php echo $data["hari"]?>
                        </th>
                    </tr>
                    <tr>
                        <th>Jam Mulai</th>
                        <th>
                            <?php echo $data["jam_mulai"]?>
                        </th>
                        <th>Jam Selesai</th>
                        <th>
                            <?php echo $data["jam_slesai"]?>
                        </th>
                    </tr>
                    <?php }?>
            </table>
        </div>
    </div>
</div>
<hr>
<?php 
    $day = date("D");
    $now = date("H:i:s");
    $mulaitamp = strtotime($jadwal[0]['jam_mulai']) - 60*60;
	$mulai = date("H:i:s", $mulaitamp);
	if($this->common_lib->indoDay($day)==$jadwal[0]['hari'] && ($now >= $mulai) && ($now <= $jadwal[0]["jam_slesai"])){
?>
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">
				Pertemuan Hari Ini <span class="float-right text-primary"><?php echo date("m-d-Y") ?></span>
		</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kbm">KBM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#absen">Absensi</a>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="tab-content">
            <div class="tab-pane active" id="kbm">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <form action="" method="post">
																<input type='hidden' name='id_kbm' value="<?php echo $datakbm[0]['id_kbm'] ?>">
                                    <h4><b>Pengumuman</b></h4>
                                    <textarea name="pengumuman" class="form-control"><?php echo $datakbm[0]['pengumuman'];?></textarea>
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
                                    <?php 
										echo "<input type='hidden' name='id_kbm' value='".$datakbm[0]['id_kbm']."'>";
								?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>File</label>
                                                <input type="file" name="lampiran0" class="form-control">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Caption</label>
                                                <input type="text" name="caption[]" class="form-control">
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
								$file  = $this->common->getData("*","lampiran_kbm","",["id_kbm" =>  $datakbm[0]['id_kbm']],["id_lampiran","desc"]);
								echo '<div class="row">';
								foreach ($file as $key => $value) {
										$cekFile = strtolower(substr($value['lampiran'],strpos($value['lampiran'],".")+1));
										if($cekFile=="pdf"){
												$img = "pdf.png";                
										}
										else if($cekFile=="doc" || $cekFile=="docx"){
												$img = "doc.png";                
										}
										else if($cekFile=="ppt" || $cekFile=="pptx"){
												$img = "ppt.png";                
										}
										else if($cekFile=="xls" || $cekFile=="xlsx"){
												$img = "xls.png";
										}
										else if($cekFile=="jpg" || $cekFile=="png" || $cekFile=="gif" || $cekFile=="jpeg"){
												$img = "jpg.png";
										}
										else{
												$img = "file.png";
										}
										?>
                                    <div class="col-lg-2">
                                        <div class="text-center img-thumbnail">
                                            <img src="<?php echo base_url()."assets/img/web/".$img ?>" class="">
                                            <hr>
                                            <b><?php echo $value['caption'] ?></b>
                                            <br>
                                            <br>
                                            <a href="<?php echo base_url()."assets/lampiran/".$value['lampiran'] ?>" class="btn btn-primary btn-block btn-sm">Download</a>
                                        </div>
                                    </div>
                                    <?php
								}
								echo "</div>";
						?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="absen">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post">
													<input type="hidden" name="id_kbm" value="<?php echo $datakbm[0]['id_kbm'] ?>">
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
                        $arrBg = array(
                            "Tanpa Keterangan" => "danger",
                            "Ijin" => "info",
                            "Sakit" => "warning",
                        );
                        foreach($siswa as $key => $s){
                            if($cek>0){
                                $absen = $this->common->getData("kode_siswa,keterangan","absensi","",["id_kbm" => $datakbm[0]['id_kbm'],"kode_siswa" => $s['kode_siswa']],"");
                                $check = $absen[0]['keterangan'];
                                $bgHadir = ($absen[0]['keterangan']=="Hadir") ? "success" : "default";
                                $bgTidakHadir = ($absen[0]['keterangan']!="Hadir") ? $arrBg[$check] : "default";
                                $hadir = $bgHadir=="success" ? "<i class='fas fa-check-circle text-success'></i>" : "";
                                $tidakHadir = $bgTidakHadir!="default" ? "<h5><b class='badge bg-".$bgTidakHadir." text-white'>".$absen[0]['keterangan']."</b></h5>" : "";
                            }
                            else{
                                $bgHadir = "success";
                                $bgTidakHadir = "default";
                                $check = "Hadir";
                                $hadir = "<i class='fas fa-check-circle text-success'></i>";
                                $tidakHadir = "";
                            }
                    ?>
                                            <tr>
                                                <td>
                                                    <input style="display:none" type="checkbox" name="absen[<?php echo $s['kode_siswa'] ?>]" id="absen<?php echo $key ?>" value="<?php echo $check ?>" checked>
                                                    <div class="btn-group">
                                                        <button type="button" id="hadir<?php echo $key ?>" data-key="<?php echo $key ?>" class="btn btn-<?php echo $bgHadir ?> btn-sm hadir"><i class="fas fa-check-circle"></i> Hadir</button>
                                                        <div class="btn-group">
                                                            <button type="button" data-bg="btn-default" id="tidak-hadir<?php echo $key ?>" class="btn btn-<?php echo $bgTidakHadir ?> btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fas fa-minus-circle"></i> Tidak Hadir
                                                            </button>
                                                            <div class="dropdown-menu tidak-hadir">
                                                                <a class="dropdown-item" data-class="danger" data-key="<?php echo $key ?>" data-capt="Tanpa Keterangan" href="#">Tanpa Keterangan</a>
                                                                <a class="dropdown-item" data-class="info" data-key="<?php echo $key ?>" data-capt="Ijin" href="#">Ijin</a>
                                                                <a class="dropdown-item" data-class="warning" data-key="<?php echo $key ?>" data-capt="Sakit" href="#">Sakit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $s['kode_siswa'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $s['nama_siswa'] ?>
                                                </td>
                                                <td id="check<?php echo $key ?>">
                                                    <?php echo $hadir ?>
                                                </td>
                                                <td id="badge<?php echo $key ?>">
                                                    <?php echo $tidakHadir ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                                <tr class="bg-warning text-white">
                                                    <th colspan="3">Total : </th>
                                                    <th><span id="chadir"><?php echo count($siswa) ?></span> Siswa</th>
                                                    <th><span id="ctidak-hadir">0</span> Siswa</th>
                                                </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"><span class="fas fa-save"></span> Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <br>
    </div>
</div>
<?php } ?>
<div id="accordion">
    <?php 
	$loopKbm = $this->common->getData("*","kbm","",["id_jadwal" => $jadwal[0]['id_jadwal'],"tanggal !=" => date("Y-m-d")],["tanggal","desc"]);
	foreach ($loopKbm as $l => $lk) {
        $lampiran  = $this->common->getData("*","lampiran_kbm","",["id_kbm" =>  $lk['id_kbm']],["id_lampiran","desc"]);
?>
        <div class="card mb-4">
            <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $l ?>">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">
						Pertemuan Tanggal <?php echo date("d-m-Y", strtotime($lk['tanggal'])) ?>
					</h6>
                </div>
            </a>
            <div id="collapse<?php echo $l ?>" class="collapse" data-parent="#accordion">
                <div class="card-body">
					<div class="row">
					    <div class="col-lg-12">
						    <ul class="nav nav-tabs">
							    <li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#a<?php echo $l ?>">KBM</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#b<?php echo $l ?>">Absensi</a>
								</li>
							</ul>
						</div>
					</div>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="a<?php echo $l ?>">
                            <h5 class="text-warning"><b>Pengumuman</b></h5>
                            <hr>
                            <p>
                                <?php echo $lk['pengumuman'] ?>
                            </p>
                            <hr>
                            <div class="row">
                            <?php 
							    foreach ($lampiran as $la => $lam) {
								    $cekFile = strtolower(substr($lam['lampiran'],strpos($lam['lampiran'],".")+1));
									if($cekFile=="pdf"){
										$img = "pdf.png";                
									}
									else if($cekFile=="doc" || $cekFile=="docx"){
											$img = "doc.png";                
									}
									else if($cekFile=="ppt" || $cekFile=="pptx"){
											$img = "ppt.png";                
									}
									else if($cekFile=="xls" || $cekFile=="xlsx"){
											$img = "xls.png";
									}
									else if($cekFile=="jpg" || $cekFile=="png" || $cekFile=="gif" || $cekFile=="jpeg"){
											$img = "jpg.png";
									}
									else{
										$img = "file.png";
									}
							?>
                            <div class="col-lg-2">
                                <div class="text-center img-thumbnail">
                                    <img src="<?php echo base_url()."assets/img/web/".$img ?>" class="">
                                    <hr>
                                    <b><?php echo $lam['caption'] ?></b>
                                    <br>
                                    <br>
                                    <a href="<?php echo base_url()."assets/lampiran/".$lam['lampiran'] ?>" class="btn btn-primary btn-block btn-sm">Download</a>
                                </div>
                            </div>
                            <?php
								}
							?>
                        </div>

                        </div>
                        <div class="tab-pane" id="b<?php echo $l ?>">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th rowspan="2" class="text-center align-middle">Kode Siswa</th>
                                            <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
                                            <th colspan="4" class="text-center">Keterangan</th>
                                        </tr>
                                        <tr class="text-white">
                                            <th class="text-center bg-success">Hadir</th>
                                            <th class="text-center bg-info">Ijin</th>
                                            <th class="text-center bg-warning">Sakit</th>
                                            <th class="text-center bg-danger">Tanpa Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($siswa as $s => $si) {
                                                $absen = $this->common->getData("keterangan","absensi","",["id_kbm" => $lk['id_kbm'],"kode_siswa" => $si['kode_siswa']],"");

                                                $hadir = "";
                                                $ijin = "";
                                                $sakit = "";
                                                $alpa = "";
                                                if(count($absen)>0){
                                                    if($absen[0]['keterangan']=="Hadir"){
                                                        $hadir = "text-success";
                                                    }
                                                    else if($absen[0]['keterangan']=="Ijin"){
                                                        $ijin = "text-info";
                                                    }
                                                    else if($absen[0]['keterangan']=="Sakit"){
                                                        $sakit = "text-warning";
                                                    }
                                                    else{
                                                        $alpa = "text-danger";
                                                    }
                                                }
                    
                                        ?>
                                            <tr>
                                                <td><?php echo $si['kode_siswa'] ?></td>
                                                <td><?php echo $si['nama_siswa'] ?></td>
                                                <td class="text-center"><?php echo $hadir!="" ? "<span class='fas fa-check-circle $hadir'></span>" : "" ?></td>
                                                <td class="text-center"><?php echo $ijin!="" ? "<span class='fas fa-check-circle $ijin'></span>" : "" ?></td>
                                                <td class="text-center"><?php echo $sakit!="" ? "<span class='fas fa-check-circle $sakit'></span>" : "" ?></td>
                                                <td class="text-center"><?php echo $alpa!="" ? "<span class='fas fa-check-circle $alpa'></span>" : "" ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>