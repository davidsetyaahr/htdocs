<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya extends CI_Controller {
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
			//"btnHref" => base_url()."data-master/biaya/biaya",
			//"btnBg" => "success",
			//"btnFa" => "keyboard",
			//"btnText" => "Tambah Data"
		);
		$card['title'] = "Biaya <span>> Biaya</span>";
		$data["data"] = $this->common->getData("*", "biaya", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/biaya/biaya', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}

	public function update_biaya()
	{
		//$filter = array("spp" => $this->input->post("spp"));
		//$filter = array("cicilan" => $this->input->post("cicilan"));
		//$filter = array("pendaftaran" => $this->input->post("pendaftaran"));
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		$this->common->update("biaya", $this->input->post(), $filter);
		redirect(base_url()."data-master/biaya");
	}


}
