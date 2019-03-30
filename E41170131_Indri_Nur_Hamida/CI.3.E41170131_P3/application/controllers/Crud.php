<?php 
 
class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
 
	function index(){
		$data['mahasiswa'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}

	function tambah(){
		$this->load->view('v_input');
	}

	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			);

		$this->m_data->input_data($data,'mahasiswa');
		redirect('crud/index');
	}

	function hapus($no_induk){
		$where = array('no_induk' => $no_induk);
		$this->m_data->hapus_data($where,'mahasiswa');
		redirect('crud/index');
	}

	function edit($no_induk){
		$where = array('no_induk' => $no_induk);
		$data['mahasiswa'] = $this->m_data->edit_data($where,'mahasiswa')->result();
		$this->load->view('v_edit',$data);
	}

	function update(){
	$no_induk = $this->input->post('no_induk');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
 
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
	);
 
	$where = array(
		'no_induk' => $no_induk
	);
 
	$this->m_data->update_data($where,$data,'mahasiswa');
	redirect('crud/index');
}

}
