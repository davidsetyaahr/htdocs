<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cicilan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
       	$menu = array(
            "title" => $this->title,
			"btnHref" => base_url()."keuangan/cicilan/input_cicilan",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		   );
		$card['title'] = "Cicilan <span>> List Cicilan</span>";
       	// $data["data"] = $this->common->getData("*", "", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/cicilan/list-cicilan');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function input_cicilan()
	{
		$menu = array(
            "title" => $this->title,
			"btnHref" => base_url()."keuangan/cicilan",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "List Data"
		   );
		$card['title'] = "Cicilan <span>> Tambah Cicilan </span>";
		$data["siswa"] = $this->common->getData("kode_siswa, nama_siswa", "siswa", "", "", "");
		$data["cicilan"] = $this->common->getData("cicilan", "biaya", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/cicilan/tambah-cicilan', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
	public function cek_cicilan_ke()
	{
		$cek = $this->common->getData("cicilan_ke",["pembayaran_cicilan", 1], "", ["kode_siswa" => $_POST["kode_siswa"], "tahun" => $_POST["tahun"]], ["cicilan_ke", "desc"]);
		if(count($cek)==0){
			echo "1";
		}
		else{
			echo $cek[0]["cicilan_ke"]+1;
		}
	}
}
