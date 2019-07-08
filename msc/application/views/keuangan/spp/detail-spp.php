<?php
    $tahunpertama = DateTime::createFromFormat("Y-m-d",$tahunPertamaBayar[0]["tanggal_bayar"]);
    $tahunterakhir = DateTime::createFromFormat("Y-m-d",$terakhirBayarSpp[0]["tanggal_bayar"]);
?>
    <div class="row">
        <div class="col-lg-12">
            <p class="bg-primary text-center h5 text-white" style="padding-top: 5px; padding-bottom: 5px; padding-left: 7px;"><?= $terakhirBayarSpp[0]["nama_siswa"]?></p>
        <div class="col-lg-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <?php 
                            $tahun_terkahir = $tahunterakhir->format("Y");
                            $tahun_pertama = $tahunpertama->format("Y");
                            for ($i=$tahun_pertama; $i <= $tahun_terkahir ; $i++) { 
                                echo '<th class="text-center" colspan="12">';
                                echo $i;
                                echo '</th>';   
                                ?>
                    </tr>
                    <tr>
                        <?php 
                        foreach($bulan as $key => $val)
                        {
                            if($key > 0){
                                echo "<th>";
                                echo $val;
                                echo "</th>";
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        foreach($bulan as $b => $valb)
                        if($b > 0){
                            $result = $this->common->getData("count(d.bulan) total", "detail_pembayaran_spp d", ["pembayaran_spp s", "d.id_pembayaran_spp=s.id_pembayaran_spp"], ["s.kode_siswa" => $terakhirBayarSpp[0]["kode_siswa"], "d.bulan" => $b, "d.tahun" => $i], "");
                            echo '<th>';
                            $fa = $result[0]['total'] == 0 ? "fas fa-minus-circle text-danger" : "fas fa-check-circle text-success ";
                            echo '<div align=center><span class="'.$fa.'"></span></div>';
                            echo '</th>';
                        }
                    ?>
                    </tr>
                </tbody>
            <?php }?>
            </table>
        </div>
    </div>