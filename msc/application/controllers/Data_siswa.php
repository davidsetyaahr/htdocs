<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		$this->load->helper('url');
	}

	public function index() 
	{
		$menu = array(
			"title" => $this->title,
		);
		$card['title'] = "Data Siswa <span>> List Data Siswa</span>";
		$data['siswa'] = $this->common->getData("*","siswa","","","");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-siswa/list-siswa', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');

	}

}

?>
