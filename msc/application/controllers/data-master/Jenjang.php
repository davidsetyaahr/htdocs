<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenjang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
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
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/jenjang/list_jenjang');
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
}
