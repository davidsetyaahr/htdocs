<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		$this->load->model('m_data_siswa');
		$this->load->helper('url');
	}

	public function index() 
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."data-siswa/list-siswa",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);
		$card['title'] = "Data Siswa <span>> List Data Siswa</span>";
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-siswa/list-siswa');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');

		$data['siswa'] = $this->common->getData()->result();
		$this->load->view('data-siswa/list-siswa', $data);
	}

}

?>
