<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			$this->title = $this->common_lib->getTitle();
			if($this->session->userdata("status") != "login")
			{
				redirect(base_url()."login");
			}
			else if($this->session->userdata("hak_akses") == "Siswa" || $this->session->userdata("hak_akses") == "Orang Tua" || $this->session->userdata("hak_akses") == "Owner")
			{
				show_404();
			}
    }
    
    public function index()
    {
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."nilai_siswa/input_nilai",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Nilai"
		);
		$card['title'] = "Nilai Siswa <span>> Nilai</span>";
		$data["data"] = $this->common->getData("id_nilai, kode_siswa, sikap, bulan, tahun, kode_tentor, tanggal_penilaian", "nilai_siswa", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('nilai_siswa/list-nilai', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
    
    public function input_nilai()
    {
		$menu = array(
			"title" => $this->title,
			"btnFa" => "keyboard",
			"btnHref" => base_url()."nilai-siswa",
			"btnBg" => "success",
			"btnText" => "List Nilai"
		);
		$card['title'] = "Nilai Siswa <span>> Input Nilai</span>";
		$data["group"] = $this->common->getData("kode_group, nama_group", "group_siswa", "", "", "");
		if(isset($_POST["kode_group"]) && isset($_POST["bulan"]) && isset($_POST["tahun"])){
			$where = ["s.kode_group" => $this->input->post("kode_group")];
			$data["siswa"] = $this->common->getData("s.kode_siswa, s.nama_siswa, g.kode_group, g.nama_group", "group_siswa g", ["siswa s", "s.kode_group=g.kode_group"], $where, ["s.kode_siswa","desc"]);
			$whereM = ["j.kode_group" => $this->input->post("kode_group")];
			$data["mapel"] = $this->common->getData("m.id_mapel, m.mata_pelajaran", "jadwal j", ["group_siswa gs", "j.kode_group=gs.kode_group", "mapel_tentor mt", "j.id_mapel_tentor=mt.id_mapel_tentor", "mapel m", "mt.id_mapel=m.id_mapel"], $whereM, "");
		}
		
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('nilai_siswa/input-nilai', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
		
	}
	
	public function load_functions()
	{
		$dataM = $this->common->getData("m.id_mapel, m.mata_pelajaran", "mapel m", "", "", "");
		$vab = ['nama'=>'fathan','mapel'=>$dataM];
		foreach($dataM as $d){ 
			$data['mapel'] = array(
				"id_mapel" => $d["id_mapel"],
				"mata_pelajaran" => $d["mata_pelajaran"]
			);
		}
		// $dataD = $this->common->getData("m.id_mapel, m.mata_pelajaran", "mapel m", "", "", "");
		// $data = ['fathan','coba', 'huh'];
		echo json_encode($vab);
		// echo json_encode($data);
	}
	public function insert_nilai()
	{
		foreach ($_POST['kode_siswa'] as $i => $value) {
			$valNilaiSiswa = array(
				"bulan" => $this->input->post("bulan"),
				"tahun" => $this->input->post("tahun"),
				"sikap" => $_POST["sikap"][$i],
				"kode_siswa" => $_POST["kode_siswa"][$i],
				"kode_tentor" => "T00100", // sesuai login nanti
				"tanggal_penilaian" => date("Y-m-d")
			);	
			$this->common->insert("nilai_siswa", $valNilaiSiswa);
			$getId = $this->common->getData("id_nilai",["nilai_siswa",1],"","",["id_nilai","desc"]);
			foreach ($_POST['id_mapel'] as $key => $val) {
				$valNilai_mapel = array(
					"id_nilai" => $getId[0]['id_nilai'],
					"nilai" => $_POST["nilai"][$i][$key],
					"id_mapel" => $_POST["id_mapel"][$i][$key],
					"catatan" => $_POST["catatan"][$i][$key]
				);

				$this->common->insert("nilai_mapel", $valNilai_mapel);
			}
		}
  		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."nilai_siswa"); 
	}
}