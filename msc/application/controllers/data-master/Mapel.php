<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		if($this->session->userdata("status") != "login")
		{
			redirect(base_url()."login");
		}
		else if($this->session->userdata("hak_akses") != "Admin"){
			show_404();
		}
	}
	
	public function index()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."data-master/mapel/input-mapel",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);
		$card['title'] = "Mata Pelajaran <span>> List Mata Pelajaran</span>";
	$data["data"] = $this->common->getData("m.id_mapel,m.mata_pelajaran,m.mata_pelajaran, j.nama_jenjang", "mapel m", ["jenjang j"," m.id_jenjang = j.id_jenjang"], "","");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/mapel/mapel', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}

	public function input_mapel()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."data-master/mapel",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Mata Pelajaran <span>> Input Mata Pelajaran</span>";
		//$msg = $this->session->flashdata("success)
		$data["data"] = $this->common->getData("*", "jenjang", "", "","");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/mapel/input-mapel', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
	public function insert_mapel()
    {
		$this->common->insert("mapel",$this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."data-master/mapel");
	}
	public function edit_mapel($id)
	{
		$where = array("id_mapel" => $id);
		$data["data"] = $this->common->getData("*", "mapel", "", $where,"");
		$data["jenjang"] = $this->common->getData("*", "jenjang", "", "","");
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."mapel",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Mapel <span>> Edit Mapel</span>";
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
				$this->load->view('data-master/mapel/edit-mapel', $data);
				$this->load->view('common/slash-card');
				$this->load->view('common/footer');
	}

		public function update(){
			$filter = array("id_mapel" => $this->input->post("id_mapel"));
			$this->common->update("mapel", $this->input->post(), $filter);
			$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
			redirect(base_url()."data-master/mapel");
		}
}
