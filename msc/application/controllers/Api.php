<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        if(!empty($this->uri->segment(3))){
            $this->kode_siswa = $this->uri->segment(3);
            $this->siswa = $this->common->getData("nama_siswa,kelas,cicilan,kode_group,awal_spp","siswa","",["kode_siswa" => $this->kode_siswa],"");
        }
        $this->date = date("Y-m-d");
/*         if($this->session->userdata("status") != "login")
		{
			redirect(base_url()."login");
		}
 */    }
    public function dashboard()
    {
        $day = date("d");
        $minggu_ke = ceil($day/7)==5 ? 4 : ceil($day/7);

        $jadwal = $this->common->getData("mata_pelajaran,jam_mulai","jadwal j",["mapel_tentor mt","j.id_mapel_tentor = mt.id_mapel_tentor","mapel m","mt.id_mapel = m.id_mapel"],["minggu_ke" => $minggu_ke,"hari" => $this->common_lib->indoDay(date("D")),"kode_group" => $this->siswa[0]['kode_group']],["jam_mulai","asc"]);
        
        $json['banner'] = array(
            "title" => "Halo, ".ucwords($this->siswa[0]['nama_siswa']),
            "msg" => count($jadwal)==0 ? "Selamat Datang Di Aplikasi MSC Bondowoso" : "Jangan lupa ada Les ".$jadwal[0]['mata_pelajaran']." Jam ".$jadwal[0]['jam_mulai']
        );

        if($this->siswa[0]['kelas']==6 || $this->siswa[0]['kelas']==9 || $this->siswa[0]['kelas']==12){
            $json['tagihan']['caption'] = "Cicilan Siswa";
            $cicilan = $this->common->getData("sum(nominal) ttl","pembayaran_cicilan","",["kode_siswa" => $this->kode_siswa],"");
            $captionTagihan = "Cicilan";
            $totalTagihan = $this->siswa[0]['cicilan']-$cicilan[0]['ttl'];
        }
        else{
            
            $spp = $this->common->getData("tanggal_bayar",["pembayaran_spp",1],"",["kode_siswa" => $this->kode_siswa],["id_pembayaran_spp","desc"]);
            
            if(count($spp)==0){
                $monthStart = substr($this->siswa[0]['awal_spp'],0,2);
                $yearStart = substr($this->siswa[0]['awal_spp'],3,4);
            }
            else{
                $monthStart = substr($spp[0]['tanggal_bayar'],5,2);
                $yearStart = substr($spp[0]['tanggal_bayar'],0,4);
            }
            
            $month1 = mktime(0,0,0,$monthStart,0,$yearStart);
            $month2 = mktime(0,0,0,date("m"),0,date("Y"));
            
            $diff = round(($month2-$month1) / 60 / 60 / 24 / 30);
            $getSpp = $this->common->getData("spp","biaya","","","");
            $captionTagihan = "SPP";
            $totalTagihan = $diff * $getSpp[0]['spp'];
        }

        $json['tagihan'] = array(
            "caption" => $captionTagihan." Siswa",            
            "total" => "Rp. ".number_format($totalTagihan,0,',','.')
        );

        $ttlKehadiran = $this->common->getData("count(id_absen) ttl","absensi","",["kode_siswa" => $this->kode_siswa,"MONTH(waktu_absen)" => date("m"),"YEAR(waktu_absen)" => date("Y")],"");

        $kehadiran = $this->common->getData("count(id_absen) ttl","absensi","",
        ["kode_siswa" => $this->kode_siswa,
        "keterangan" => "Hadir",
        "MONTH(waktu_absen)" => date("m"),
        "YEAR(waktu_absen)" => date("Y")]
        ,"");

        if($ttlKehadiran[0]['ttl']==0){
            $hadir = 0;
            $tidak_hadir = 0;
        }
        else{
            $hadir = $kehadiran[0]['ttl']==0 ? 0 : 100 /  ($ttlKehadiran[0]['ttl']/$kehadiran[0]['ttl']);
            $tidak_hadir = 100 - $hadir;
        }

        

        $json['kehadiran'] = array(
            "caption" => "Kehadiran Bulan ".$this->common_lib->indoMonth(date("m")),
            "hadir" => $hadir,
            "tidak_hadir" => $tidak_hadir
        );


        $materi = $this->db->query("select distinct mt.id_mapel, mt.kode_tentor,count(l.id_lampiran) ttl from lampiran_kbm l join jadwal j on l.id_jadwal = j.id_jadwal join mapel_tentor mt on j.id_mapel_tentor = mt.id_mapel_tentor where j.kode_group = '".$this->siswa[0]['kode_group']."'")->result_array();
        
        $json['materi'] = array(
            "caption" => $materi[0]['ttl']." Materi Pembelajaran",
            "mapel" => is_array($materi[0]['id_mapel']) ? count($materi[0]['id_mapel']) : 1,
            "tentor" => is_array($materi[0]['kode_tentor']) ? count($materi[0]['kode_tentor']) : 1,
        );
        
        echo json_encode($json);
   }

   public function jadwal()
   {
       $date = date("d");
       $day = date("D");
       $minggu_ke = ceil($date/7)==5 ? 4 : ceil($date/7);
       $jadwal = $this->common->getData("m.mata_pelajaran,t.nama_tentor,j.hari_ke,j.jam_mulai,j.jam_slesai","jadwal j",["mapel_tentor mt","j.id_mapel_tentor = mt.id_mapel_tentor","mapel m","mt.id_mapel = m.id_mapel","tentor t","mt.kode_tentor = t.kode_tentor"],["j.kode_group" => $this->siswa[0]['kode_group'],"j.minggu_ke" => $minggu_ke,"j.hari_ke >=" => 6],["j.hari_ke","asc"]);
       $json = [];
       $now = date("H:i:s");
       foreach ($jadwal as $key => $value) {
           $diff = $value['hari_ke']-$date;
           if($diff==0){
               $img = array(
                   "img" => "calendar32.png",
                   "caption" =>"Hari Ini",
                );
            }
            else if($diff==1){
                $img = array(
                    "img" => "calendar_clock32.png",
                    "caption" => "Besok",
                );
            }
            else{
                $img = array(
                    "img" => "calendar_clock32.png",
                    "caption" => $diff." Hari Lagi",
                );
           }
           $value['img'] = $img['img'];
           $value['img_caption'] = $img['caption'];
           $json[] = $value;
        }
        echo json_encode($json);
    }

    public function tagihan()
    {
        if($this->siswa[0]['kelas']==6 || $this->siswa[0]['kelas']==9 || $this->siswa[0]['kelas']==12){
            $tahun = $this->common->getData("tahun",["pembayaran_cicilan",1],"",["kode_siswa" => $this->kode_siswa],["tahun","desc"]);
            $cicilan = $this->common->getData("sum(nominal) ttl","pembayaran_cicilan","",["kode_siswa" => $this->kode_siswa,"tahun" => $tahun[0]['tahun']],"");
            $json['tagihan'][0]['caption'] = "Cicilan Tahun ".$tahun[0]['tahun'];
            $json['tagihan'][0]['biaya'] = $this->siswa[0]['cicilan'];
            $json['tagihan'][0]['kekurangan'] = $this->siswa[0]['cicilan'] - $cicilan[0]['ttl'];
        }
        else{
            $spp = $this->common->getData("tanggal_bayar",["pembayaran_spp",1],"",["kode_siswa" => $this->kode_siswa],["id_pembayaran_spp","desc"]);
            $biaya = $this->common->getData("spp","biaya","","","");
            if(count($spp)==0){
                $monthStart = substr($this->siswa[0]['awal_spp'],0,2);
                $yearStart = substr($this->siswa[0]['awal_spp'],3,4);
            }
            else{
                $monthStart = substr($spp[0]['tanggal_bayar'],5,2);
                $yearStart = substr($spp[0]['tanggal_bayar'],0,4);
            }
            $month1 = mktime(0,0,0,$monthStart,0,$yearStart);
            $month2 = mktime(0,0,0,date("m"),0,date("Y"));
            
            $diff = round(($month2-$month1) / 60 / 60 / 24 / 30);

            $month = (int)$monthStart;
            $year = $yearStart;
            $json['tagihan'] = [];
            for ($i=(int)$monthStart; $i <= ($monthStart+$diff) ; $i++) { 
                $arr = array(
                    "caption" => "Spp Bulan ".$this->common_lib->indoMonth($month)." ".$year,
                    "biaya" => $biaya[0]['spp'],
                    "kekurangan" => ""
                );
                $json['tagihan'][] = $arr;
                if($month==12){
                    $month = 1;
                    $year++;
                }
                else{
                    $month++;
                }
            }
        }
        echo json_encode($json);
    }

    public function kehadiran()
    {

        $ttlKehadiran = $this->common->getData("count(id_absen) ttl","absensi","",["kode_siswa" => $this->kode_siswa,"MONTH(waktu_absen)" => date("m"),"YEAR(waktu_absen)" => date("Y")],"");

        $hadir = $this->common->getData("count(id_absen) ttl","absensi","",
        ["kode_siswa" => $this->kode_siswa,
        "keterangan" => "Hadir",
        "MONTH(waktu_absen)" => date("m"),
        "YEAR(waktu_absen)" => date("Y")]
        ,"");
        $sakit = $this->common->getData("count(id_absen) ttl","absensi","",
        ["kode_siswa" => $this->kode_siswa,
        "keterangan" => "Sakit",
        "MONTH(waktu_absen)" => date("m"),
        "YEAR(waktu_absen)" => date("Y")]
        ,"");
        $ijin = $this->common->getData("count(id_absen) ttl","absensi","",
        ["kode_siswa" => $this->kode_siswa,
        "keterangan" => "Ijin",
        "MONTH(waktu_absen)" => date("m"),
        "YEAR(waktu_absen)" => date("Y")]
        ,"");
        $alpa = $this->common->getData("count(id_absen) ttl","absensi","",
        ["kode_siswa" => $this->kode_siswa,
        "keterangan" => "Tanpa Keterangan",
        "MONTH(waktu_absen)" => date("m"),
        "YEAR(waktu_absen)" => date("Y")]
        ,"");

        if($ttlKehadiran[0]['ttl']==0){
            $arr = array(0,0,0,0);
        }
        else{
            $valHadir = $hadir[0]['ttl']==0 ? 0 : 100 /  ($ttlKehadiran[0]['ttl']/$hadir[0]['ttl']);
            $valSakit = $sakit[0]['ttl']==0 ? 0 : 100 /  ($ttlKehadiran[0]['ttl']/$sakit[0]['ttl']);
            $valIjin = $ijin[0]['ttl']==0 ? 0 : 100 /  ($ttlKehadiran[0]['ttl']/$ijin[0]['ttl']);
            $valAlpa = $alpa[0]['ttl']==0 ? 0 : 100 /  ($ttlKehadiran[0]['ttl']/$alpa[0]['ttl']);
            $arr = array($valHadir,$valSakit,$valIjin,$valAlpa);
        }

        $json['kehadiran'] = array(
            "hadir" => array(
                "caption" => "Hadir",
                "value" => $arr[0]
            ),
            "sakit" => array(
                "caption" => "Sakit",
                "value" => $arr[1]
            ),
            "ijin" => array(
                "caption" => "Ijin",
                "value" => $arr[2]
            ),
            "alpa" => array(
                "caption" => "Tanpa Keterangan",
                "value" => $arr[3]
            ),
        );
        echo json_encode($json);
    }

    public function materi()
    {
        $materi = $this->common->getData("l.caption,t.nama_tentor,l.lampiran","lampiran_kbm l",["jadwal j","l.id_jadwal = j.id_jadwal","mapel_tentor mt","j.id_mapel_tentor = mt.id_mapel_tentor","tentor t","mt.kode_tentor = t.kode_tentor"],["j.kode_group" => $this->siswa[0]['kode_group']],["l.id_lampiran","desc"]);
        foreach($materi as $key => $m){
            $cekFile = strtolower(substr($m['lampiran'],strpos($m['lampiran'],".")+1));
            if($cekFile=="pdf"){
                $img = "pdf32.png";                
            }
            else if($cekFile=="doc" || $cekFile=="docx"){
                $img = "word32.png";                
            }
            else if($cekFile=="ppt" || $cekFile=="pptx"){
                $img = "ppt32.png";                
            }
            else if($cekFile=="xls" || $cekFile=="xlsx"){
                $img = "xls32.png";
            }
            else if($cekFile=="jpg" || $cekFile=="png" || $cekFile=="gif" || $cekFile=="jpeg"){
                $img = "img32.png";
            }
            else{
                $img = "file32.png";
            }
            $materi[$key]['img'] = $cekFile=="pdf" ? "pdf32.png" : "word32.png";
        }
        echo json_encode($materi);
    }

    public function login()
    {
        $cekUser = $this->common->getData("count(id_user) ttl,password,id_child","user","",["username" => $_POST['username']],"");

        $json['status'] = "error";

        if($cekUser[0]['ttl']> 0 && password_verify($_POST['password'], $cekUser[0]['password'])){
            $json['status'] = "success";
            $getKode = $this->common->getData("kode_siswa","siswa","",["id_siswa" => $cekUser[0]['id_child']],"");
            $json['kode_siswa'] = $getKode[0]['kode_siswa'];
        }

        echo json_encode($json);
    }
}