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
		$data["siswa"] = $this->common->getData("kode_siswa, nama_siswa, cicilan", "siswa", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/cicilan/list-cicilan', $data);
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
		$cek_cicilan_ke = $this->common->getData("cicilan_ke",["pembayaran_cicilan", 1], "", ["kode_siswa" => $_POST["kode_siswa"], "tahun" => $_POST["tahun"]], ["cicilan_ke", "desc"]);
		if(count($cek_cicilan_ke)==0){
			$json['cicilan_ke'] = 1;
		}
		else{
			$json['cicilan_ke'] = $cek_cicilan_ke[0]["cicilan_ke"]+1;
		}
		//select cicilan dari tb siswa
		$cicilan_siswa = $this->common->getData("cicilan", "siswa", "", ["kode_siswa" => $_POST["kode_siswa"]], "");
		//sum
		$cek_total_cicilan = $this->common->getData("sum(nominal) total", "pembayaran_cicilan", "", ["kode_siswa" => $_POST["kode_siswa"], "tahun" => $_POST["tahun"]], "");
			$json["kekurangan"] = $cicilan_siswa[0]["cicilan"] - $cek_total_cicilan[0]["total"];
		//$json['kekurangan'] = pengurangan cicilan - sum
		header("content-type:json/application");
		echo json_encode($json);

	}

	public function insert_cicilan()
	{
		$tgl = date("Y-m-d");
		$value = array(
			"kode_siswa" => $this->input->post("kode_siswa"),
			"tahun" => $this->input->post("tahun"),
			"cicilan_ke" => $this->input->post("cicilan_ke"),
			"nominal" => $this->input->post("nominal"),
			"tanggal_bayar" => $tgl
		);
		$this->common->insert("pembayaran_cicilan", $value);
		$getIdCicilan = $this->common->getData("id_pembayaran_cicilan", ["pembayaran_cicilan", 1], "", "", ["id_pembayaran_cicilan", "desc"]);
		$valLapKeuangan = array(
			"id_parent" => $getIdCicilan[0]["id_pembayaran_cicilan"],
			"tanggal" => date("Y-m-d"),
			"nominal" => $_POST["nominal"],
			"tipe" => "Cicilan"
		);
		$this->common->insert("laporan_keuangan", $valLapKeuangan);
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."keuangan/cicilan");
	}
}
