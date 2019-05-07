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
        $data["data"] = $this->common->getData("*", "tentor", "", "", "");
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
        // $msg = $this->session->flashdata("success");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('tentor/input-tentor');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
    public function insert_tentor()
    {
		$this->common->insert("tentor",$this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."tentor");
	}

	public function edit_tentor($kode)
	{
		$where = array("kode_tentor" => $kode);
		$data["data"] = $this->common->getData("*", "tentor", "", $where, "");
		// $this
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
		$this->common->update("tentor", $this->input->post(), $filter);
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		redirect(base_url()."tentor");
	}
}
