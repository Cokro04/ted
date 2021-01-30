<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{



	public function get($id = null)
	{
		$this->db->from('tbl_admin');
		if ($id != null) {
			$this->db->where('barang_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}


	public function getBarang($id = null)
	{
		$this->db->from('tbl_barang');
		if ($id != null) {
			$this->db->where('barang_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function Agen()
	{
		return $this->db->get('tbl_agen')->result_array();
	}

	public function whereBarang($id)
	{
		$this->db->from('tbl_barang');
		$this->db->like('id_user', $id);
		$query = $this->db->get();
		return $query;
	}

	public function whereStatus()
	{
		$this->db->from('tbl_barang');
		$this->db->where('status', 'BK');
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'kode_barang' => $post['kode_barang'],
			'jenis' => $post['jenis'],
			'isi' => $post['isi'],
			'berat' => $post['berat'],
			'alamat' => $post['alamat'],
			'created' => date('Y-m-d H:i:s')
		];
		$this->db->insert('tbl_barang', $params);
	}


	public function edit($post)
	{
		$params = [
			'kode_barang' => $post['kode_barang'],
			'jenis' => $post['jenis'],
			'isi' => $post['isi'],
			'berat' => $post['berat'],
			'alamat' => $post['alamat'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('barang_id', $post['id']);
		$this->db->update('tbl_admin', $params);
	}

	public function editstatus($post)
	{
		$params = [
			'status' => $post['status'],
		];
		$this->db->where('barang_id', $post['barang_id']);
		$this->db->update('tbl_barang', $params);
	}

	public function del($id)
	{
		$this->db->where('barang_id', $id);
		$this->db->delete('tbl_admin');
	}
}
