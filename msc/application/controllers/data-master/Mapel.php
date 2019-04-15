<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}
	public function index()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url(),
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);
		$card['title'] = "Mata Pelajaran <span>> List Mata Pelajaran</span>";
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/mapel/list-mapel');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
}
