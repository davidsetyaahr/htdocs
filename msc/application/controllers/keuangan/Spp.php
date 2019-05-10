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
		// $data["data"] = $this->common->getData("*", "", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/list-spp');
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
		//$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/edit-spp');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}
	/*public function insert_spp(){
		$this->common->insert("spp",$this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."keuangan/spp");
	}

	public function edit_spp($kode)
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
}
