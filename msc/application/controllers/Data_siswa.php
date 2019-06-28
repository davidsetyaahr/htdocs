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
		$card['title'] = "Detail <span>> Detail Daftar Siswa </span>";
		$filter = array("kode_siswa" => $this->input->post("kode_siswa"));
		$data['detail'] = $this->common->detail_data_siswa($filter);
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('data-siswa/detail-data-siswa', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }

}

?>
