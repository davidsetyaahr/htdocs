<?php

	class Lihat_data extends CI_Model
	{	
		function ambilData()
		{
			return $this->db->get('user');
		}
	}
?>