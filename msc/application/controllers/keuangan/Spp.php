<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
		$menu = array(
            "title" => $this->title,
			"btnHref" => base_url()."keuangan/spp/input_spp",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);

		$card['title'] = "Spp <span>> List Spp</span>";
		$data["siswa"] = $this->common->getData("kode_siswa, nama_siswa", "siswa", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/list-spp', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}

	public function input_spp()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."keuangan/spp",
			"btnBg" => "primary",
			"btnFa" => "keyboard",
			"btnText" => "List Spp"
		);
		$card['title'] = "Spp <span>> Input SPP </span>";
		$data["siswa"] = $this->common->getData("kode_siswa,nama_siswa", "siswa", "", "", "");
		$data["spp"] = $this->common->getData("spp", "biaya", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/input-spp', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}
	public function insert_spp(){
		//tanggal sekarang
		$tgl = date("Y-m-d");
		//get tahun dan bulan dari spp
		$getSpp = $this->common->getData("d.tahun, d.bulan", ["pembayaran_spp p", 1], ["detail_pembayaran_spp d","p.id_pembayaran_spp = d.id_pembayaran_spp"], ["p.kode_siswa" => $_POST["kode_siswa"]], ["d.id_detail", "desc"]);
		if(count($getSpp)==0){
			$bulan_terakhir = 0;
			$tahun_terakhir = date("Y");
		}
		else{
			$bulan_terakhir = $getSpp[0]["bulan"];
			$tahun_terakhir = $getSpp[0]["tahun"];
		}
		//jumlah bulan yang ingin dibayar

		$valPembayaranSpp = array(
			"kode_siswa" => $_POST["kode_siswa"],
			"nominal" => $_POST["nominal"],
			"tanggal_bayar" => $tgl
		);
		$this->common->insert("pembayaran_spp", $valPembayaranSpp);

		$idEnd = $this->common->getData("id_pembayaran_spp",["pembayaran_spp",1],"","",["id_pembayaran_spp","desc"]);

		$banyak_bulan = $_POST["jumlah_bulan"];
		for ($i=1; $i <= $banyak_bulan ; $i++) {
			$jumlah_bulan = $bulan_terakhir+$i;
			if($jumlah_bulan > 12 ){
				$tahun = $tahun_terakhir+1;
				$bulan = $jumlah_bulan-12;
			}
			else{
				$tahun = $tahun_terakhir;
				$bulan = $jumlah_bulan;
			}
			$val = array(
				"id_pembayaran_spp" => $idEnd[0]['id_pembayaran_spp'],
				"bulan" => $bulan,
				"tahun" => $tahun,
			); 
			$this->common->insert("detail_pembayaran_spp", $val);
		}
		$valLapKeuangan = array(
			"id_parent" => $idEnd[0]["id_pembayaran_spp"],
			"tanggal" => date("Y-m-d"),
			"nominal" => $_POST["total"],
			"tipe" => "Spp"
		);
		$this->common->insert("laporan_keuangan", $valLapKeuangan);
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."keuangan/spp");
	}

	/*public function edit_spp($kode)
	{
		/*$where = array("id_spp" => $kode);
		$data["data"] = $this->common->getData("*", "jenjang", "", $where, "");*/
		// $this
		/*$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."keuangan/spp",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Tentor <span>> Edit spp</span>";
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/edit_spp', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function update_spp(){
		$filter = array("id_spp" => $this->input->post("id_spp"));
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		$this->common->update("spp", $this->input->post(), $filter);
		redirect(base_url()."keuangan/spp");
	}*/

	public function spp_bayar()
	{
		$banyak_bulan = $_POST["jumlah_bulan"];
		$cek = $this->common->getData("spp", "biaya", "", "", "");
		if(count($cek) == 0){
			$spp = $cek[0]["spp"] * 0;
		}
		else{
			$spp = $cek[0]["spp"] * $banyak_bulan;
		}
		echo $spp;
	}
}
