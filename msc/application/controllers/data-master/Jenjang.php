<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenjang extends CI_Controller {
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
			"btnHref" => base_url()."data-master/jenjang/input-jenjang",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Jenjang"
		);
		$card['title'] = "Jenjang <span>> List Jenjang</span>";
		$data["data"] = $this->common->getData("*", "jenjang", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/jenjang/list_jenjang', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}

	public function input_jenjang()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."data-master/jenjang",
			"btnBg" => "primary",
			"btnFa" => "keyboard",
			"btnText" => "Lihat Jenjang"
		);
		$card['title'] = "Jenjang <span>> Input Jenjang</span>";
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/jenjang/input_jenjang');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}

	public function insert_jenjang(){
		$this->common->insert("jenjang",$this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."data-master/jenjang");
	}

	public function edit_jenjang($kode)
	{
		$where = array("id_jenjang" => $kode);
		$data["data"] = $this->common->getData("*", "jenjang", "", $where, "");
		$menu = array(
		"title" => $this->title,
		"btnHref" => base_url()."data-master/Jenjang",
		"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Tentor <span>> Edit Jenjang</span>";
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('data-master/jenjang/edit_jenjang', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function update_jenjang(){
		$filter = array("id_jenjang" => $this->input->post("id_jenjang"));
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		$this->common->update("jenjang", $this->input->post(), $filter);
		redirect(base_url()."data-master/jenjang");
	}
}