<?php

	class BarangModel extends CI_Model{

		private $_table = 'barang';

		private $kodeBarang;
		private $namaBarang;
		private $deskripsiBarang;
		private $stokBarang;
		private $hargaBarang;
		
		//untuk mengambil data keseluruhan
		public function getAll(){
			return $this->db->getAll($this->_table->result());
		}

		//untuk mengambi perbaris dengan kode baran
		public function getAllById($kode){
			return $this->db->get_where($this->_table, ['kode_barang' => $kode])->row();
		}

		//untuk menyimpan barang
		public function save(){
			$post->$this->input->post();

			$this->kodeBarang=$post['kode_barang'];
			$this->namaBarang=$post['nama_barang'];
			$this->deskripsiBarang=$post['deskripsibarang'];
			$this->stokBarang=$post['stokbarang'];
			$this->hargaBarang=$post['hargabarang'];
			$this->db->insert($this->_table, $this);
		}

		//untuk mengedit data barang
		public function edit($kodeBarang){
			$post->$this->input->post();

			$this->kodeBarang=$post['kode_barang'];
			$this->namaBarang=$post['nama_barang'];
			$this->deskripsiBarang=$post['deskripsibarang'];
			$this->stokBarang=$post['stokbarang'];
			$this->hargaBarang=$post['hargaBarang'];
			$this->db->insert($this->_table, $this, array['kode_barang' => $post('kode_barang')]);
			//update barang set ... where kode_barang = 
		}

		//untuk menghapus barang
		public function hapus($kodeBarang){
			$this->db->delete($this->_table, $this, array['kode_barang' => $kode]);
		}
	}	
?>