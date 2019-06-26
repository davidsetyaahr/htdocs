<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
    }
    public function dashboard($kode_siswa)
    {
        $monthNow = (int)date("m");
        $siswa = $this->common->getData("kelas,tgl_daftar","siswa","",["kode_siswa" => $kode_siswa],"");
        $monthSign = (int)substr($siswa[0]['tgl_daftar'],5,2);
        if($siswa[0]['kelas']==6 || $siswa[0]['kelas']==9 || $siswa[0]['kelas']==12){

        }
        else{
              $spp = $this->common->getData("count(bulan) ttl","detail_pembayaran_spp d",["pembayaran_spp p","d.id_pembayaran_spp = p.id_pembayaran_spp"],["p.kode_siswa" => $kode_siswa],"d.");
        }
    }
}