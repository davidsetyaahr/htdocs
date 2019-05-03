<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}
}


?>
