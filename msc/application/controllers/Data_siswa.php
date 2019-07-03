<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		$this->load->helper('url');
		if($this->session->userdata("status") != "login")
		{
			redirect(base_url()."login");
		}
		else if($this->session->userdata("hak_akses") == "Siswa" || $this->session->userdata("hak_akses") == "Orang Tua")
		{
			show_404();
		}
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
		$filter = array("kode_siswa" => $kode_siswa);
		$data['detail'] = $this->common->detail_data_siswa($filter);
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('data-siswa/detail-data-siswa', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }

    public function update_siswa() { 
    	$filter = array("kode_siswa" => $this->input->post("kode_siswa"));
		//$this->common->delete("siswa_ortu", $filter);
		$siswa = array(
			"nama_siswa" => $this->input->post("nama_siswa"),
			"tgl_lahir" => $this->input->post("tgl_lahir"),
			"jk" => $this->input->post("jk"),
			"alamat" => $this->input->post("alamat"),
			"no_hp" => $this->input->post("no_hpsiswa"),
			"kelas" => $this->input->post("kelas"),
			"cicilan" => $this->input->post("cicilan"),
			"kode_group" => $this->input->post("kode_group"),
			"tgl_daftar" => $this->input->post("tgl_daftar")
		);
		$this->common->update("siswa", $siswa, $filter);
		for($i=0; $i<count($_POST['id_ortu']); $i++){
			$siswaOrtu = array(
				"nama_ortu" => $this->input->post("nama_ortu"),
				"no_hpwali" => $this->input->post("no_hpwali")
			);
			//$this->common->insert("siswa_ortu", $siswaOrtu);
		}
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		redirect(base_url()."data-siswa");
    }
}

?>
