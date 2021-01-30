<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode_pos_m extends CI_Model {



	public function get($id = null)
	{
		$this->db->from('tbl_kode_pos');
		if($id != null) {
			$this->db->where('pos_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}