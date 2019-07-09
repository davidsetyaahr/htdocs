<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		if($this->session->userdata("status") != "login")
		{
			redirect(base_url()."login");
		}
		else if($this->session->userdata("hak_akses") == "Siswa" || $this->session->userdata("hak_akses") == "Tentor" || $this->session->userdata("hak_akses") == "Orang Tua")
		{
			show_404();
		}
	}
	
	public function index()
	{
		$data["bulan"] = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."keuangan/spp/input_spp",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);
		
		$card['title'] = "Spp <span>> List Spp</span>";
		$data["siswa"] = $this->common->getData("kode_siswa, nama_siswa", "siswa", "", "", "");
		$data["group"] = $this->common->getData("kode_group, nama_group", "group_siswa", "", "", "");
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
		$getSpp = $this->common->getData("p.id_pembayaran_spp, d.tahun, d.bulan", ["pembayaran_spp p", 1], ["detail_pembayaran_spp d","p.id_pembayaran_spp = d.id_pembayaran_spp"], ["p.kode_siswa" => $_POST["kode_siswa"]], ["d.id_detail", "desc"]);
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
		//insert to notif
		$getKodeSiswa = $this->common->getData("kode_siswa", ["pembayaran_spp", 1], "", "", ["id_pembayaran_spp", "desc"]); 
		$valNotif = array(
			"kode_siswa" => $getKodeSiswa[0]["kode_siswa"],
			"pesan" => "Pembayaran SPP Berhasil",
			"tanggal" => $tgl
		);
		$this->common->insert("notif", $valNotif);
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."keuangan/spp");
	}

	public function ambil_siswa()
	{
		$cek = $this->common->getData("s.nama_siswa, s.kode_siswa", "siswa s", ["group_siswa g", "s.kode_group=g.kode_group"], ["s.kode_group" => $_POST["kode_group"]], "");
		if(count($cek) > 0){
			echo "<option value=''>---Option---</option>";
			foreach ($cek as $s) 
			{
				echo '<option value="'.$s["kode_siswa"].'">'.$s["nama_siswa"].'</option>';
			}
		}
	}
	
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

	public function detail_spp($kode_siswa)
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."keuangan/spp",
			"btnBg" => "primary",
			"btnFa" => "keyboard",
			"btnText" => "List Spp"
		);

		$data["bulan"] = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    	$data["tahunPertamaBayar"] = $this->common->getData("tanggal_bayar", ["pembayaran_spp", 1], "", ["kode_siswa" => $kode_siswa], ["tanggal_bayar", "asc"]);
		$data["terakhirBayarSpp"] = $this->common->getData("p.tanggal_bayar, s.nama_siswa, s.kode_siswa", ["pembayaran_spp p", 1], ["siswa s", "p.kode_siswa=s.kode_siswa"], ["p.kode_siswa" => $kode_siswa], ["tanggal_bayar", "desc"]);
		// $data["siswa"] = $this->common->getData("nama_siswa, kode_siswa", "siswa","", ["kode_siswa" = $])
		$card['title'] = "Spp <span>> Detail SPP </span>";
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/detail-spp', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
}
