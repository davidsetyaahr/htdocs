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

	public function edit_siswa($kode_siswa)
	{	
		$menu = array(
			"title" => $this->title,
		);
		$card['title'] = "Data Siswa <span>> Edit Data Siswa</span>";
		$data['siswa'] = $this->common->getData("*","siswa","",["kode_siswa" => $kode_siswa],"");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('data-siswa/edit-siswa', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}
	
	public function detail($kode_siswa)
	{
		$menu = array(
			"title" => $this->title,
		);
		$card['title'] = "detail <span>> Detail Daftar Siswa </span>";
		//$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('daftar_siswa/detail-daftar-siswa');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }

}

?>
