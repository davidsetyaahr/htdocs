<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_perubahan_jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
    }
    public function index()
    {
    }
}