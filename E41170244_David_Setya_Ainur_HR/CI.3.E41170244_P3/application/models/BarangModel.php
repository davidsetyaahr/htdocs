<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {
	private $_table = "barang";

	public $kodeBarang;
	public $namaBarang;
	public $deskripsi;
	public $stok;
	public $harga;

	public function getAll()
	{
		return $this->db->get($this->_table)->result_array();
	}

	public function getAllById($kodeBarang)
	{
		return $this->db->get_where($this->_table, ["kodeBarang" => $kodeBarang])->result_array();
	}

	public function save()
	{
		$this->db->insert($this->_table, $this->input->post());
	}

	public function getwhere($tb, $filter)
	{
		return $this->db->get_where($tb, $filter)->result_array();
	}

	public function delete($filter)
	{
		$this->db->delete($this->_table, $filter);
	}

	public function update($filter)
	{
		$this->db->update($this->_table, $this->input->post(),$filter);
	}

}
