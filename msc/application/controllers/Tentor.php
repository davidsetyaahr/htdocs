<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}
	
	public function index()
	{
        $menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."tentor/input_tentor",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);
		$card['title'] = "Tentor <span>> List Tentor</span>";
		$data["data"] = $this->common->getdata("*", "tentor", "", "", "");
//		$data["mapel"] = $this->common->getData("t.nama_tentor, t.jk, t.pendidikan_terakhir, t.no_hp, t.alamat, t.gaji, t.kode_tentor, m.id_mapel, m.mata_pelajaran", "mapel_tentor mt", ["mapel m", "m.id_mapel=mt.id_mapel", "tentor t", "t.kode_tentor=mt.kode_tentor"], "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('tentor/tentor', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
        
	}

	public function input_tentor()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."tentor",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Tentor <span>> Input Tentor</span>";
		$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('tentor/input-tentor', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
    public function insert_tentor()
    {
		$tentor = array(
			"kode_tentor" => $this->input->post("kode_tentor"),
			"nama_tentor" => $this->input->post("nama_tentor"),
			"pendidikan_terakhir" => $this->input->post("pendidikan_terakhir"),
			"no_hp" => $this->input->post("no_hp"),
			"jk" => $this->input->post("jk"),
			"alamat" => $this->input->post("alamat"),
			"gaji" => $this->input->post("gaji")
		);
		$this->common->insert("tentor", $tentor);
		for($i=0; $i<count($_POST['id_mapel']); $i++){
			$mapelTentor = array(
				"id_mapel" => $_POST['id_mapel'][$i],
				"kode_tentor" => $this->input->post("kode_tentor")
			);
			$this->common->insert("mapel_tentor", $mapelTentor);
		}
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."tentor");
	}
	
	public function edit_tentor($kode)
	{
		$where = array("t.kode_tentor" => $kode);
		$data["data"] = $this->common->getData("mt.id_mapel_tentor, t.kode_tentor, t.nama_tentor, t.jk, t.alamat, t.no_hp, t.pendidikan_terakhir, t.gaji, m.id_mapel, m.mata_pelajaran", "mapel_tentor mt", ["tentor t", "mt.kode_tentor=t.kode_tentor", "mapel m", "mt.id_mapel=m.id_mapel"], $where, "");
		$data["mapel"] = $this->common->getData("*", "mapel", "", "", "");
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."tentor",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Tentor <span>> Edit Tentor</span>";
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('tentor/edit-tentor', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}
	
	public function update(){
		$filter = array("kode_tentor" => $this->input->post("kode_tentor"));
		$this->common->delete("mapel_tentor",$filter);
		$tentor = array(
			"nama_tentor" => $this->input->post("nama_tentor"),
			"pendidikan_terakhir" => $this->input->post("pendidikan_terakhir"),
			"no_hp" => $this->input->post("no_hp"),
			"jk" => $this->input->post("jk"),
			"alamat" => $this->input->post("alamat"),
			"gaji" => $this->input->post("gaji")
		);
		$this->common->update("tentor", $tentor, $filter);
		for($i=0; $i<count($_POST['id_mapel']); $i++){
			$mapelTentor = array(
				"id_mapel" => $_POST['id_mapel'][$i],
				"kode_tentor" => $this->input->post("kode_tentor")
			);
			$this->common->insert("mapel_tentor", $mapelTentor);
		}
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		redirect(base_url()."tentor");
	}
}
