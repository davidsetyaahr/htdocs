<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
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
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('nilai_siswa/list-nilai');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
    
    public function input_nilai()
    {
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."nilai_siswa",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "List Nilai"
		);
		$card['title'] = "Nilai Siswa <span>> Input Nilai</span>";
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('nilai_siswa/input-nilai');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
}