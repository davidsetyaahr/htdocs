<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata();
	}
	public function index()
	{
		$data['barang'] = $this->BarangModel->getAll();
		$this->load->view("admin/_partials/top");
		$this->load->view("admin/overview",$data);
		$this->load->view("admin/_partials/bottom");
	}
	public function add()
	{
		$this->load->view("admin/_partials/top");
		$this->load->view("admin/add");
		$this->load->view("admin/_partials/bottom");
	}
	public function insert()
	{
		$this->BarangModel->save();
		redirect(base_url()."index.php/admin");
	}
	public function delete()
	{
		$this->BarangModel->delete(["kodeBarang" => $this->uri->segment(3)]);
		redirect(base_url()."index.php/admin");
	}
	public function edit()
	{
		$data['barang'] = $this->BarangModel->getwhere("barang",["kodeBarang" => $this->uri->segment(3)]);
		$this->load->view("admin/_partials/top");
		$this->load->view("admin/edit", $data);
		$this->load->view("admin/_partials/bottom");
	}
	public function update()
	{
		$this->BarangModel->update(["kodeBarang" => $this->input->post("kodeBarang")]);
		redirect(base_url()."index.php/admin");
	}
}